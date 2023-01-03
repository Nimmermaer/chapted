<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Middlewares;

use ChaptedTeam\Chapted\Domain\Model\Player;
use Doctrine\DBAL\Exception;
use Google\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Session\UserSessionManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException;
use TYPO3\CMS\Frontend\Authentication\FrontendUserAuthentication;

class GoogleFrontendLoginMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly Client $client,
        protected Player $player,
        private readonly Context $context
    ) {
    }

    /**
     * @throws IllegalObjectTypeException
     * @throws Exception
     */
    public function process(
        ServerRequestInterface $serverRequest,
        RequestHandlerInterface $requestHandler
    ): ResponseInterface {
        if (($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['chapted']['google']['clientID'] ?? false) && ($serverRequest->getQueryParams()['code'] ?? false)) {
            $this->getGoogleAccountInformation($serverRequest->getQueryParams()['code']);
            $this->registrationFrontendUser($serverRequest, $requestHandler);
        }

        return $requestHandler->handle($serverRequest);
    }

    public function getGoogleAccountInformation($token): void
    {
        $this->client->setClientId($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['chapted']['google']['clientID']);
        $this->client->setClientSecret($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['chapted']['google']['clientSecret']);
        $this->client->setRedirectUri($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['chapted']['google']['redirectUri']);
        $this->client->addScope('email');
        $this->client->addScope('profile');

        $token = $this->client->fetchAccessTokenWithAuthCode($token);

        $this->client->setAccessToken($token['access_token']);

        // get profile info
        $googleServiceOauth2 = new \Google_Service_Oauth2($this->client);
        $this->player->setGoogleInfo($googleServiceOauth2->userinfo->get());
    }

    /**
     * @param array $typo3Player
     * @throws Exception
     */
    public function addFrontendUserIfNotExist(bool &$typo3Player, Connection $connection): void
    {
        $connection->insert(
            'fe_users',
            [
                'tx_extbase_type' => 'Player',
                'name' => $this->player->getGoogleInfo()->getName(),
                'email' => $this->player->getGoogleInfo()->getEmail(),
                'google_id' => $this->player->getGoogleInfo()->getId(),
                'username' => $this->player->getGoogleInfo()->getId(),
                'google_info' => json_encode(
                    (array) $this->player->getGoogleInfo()->toSimpleObject(),
                    JSON_THROW_ON_ERROR
                ),
                'usergroup' => 1,
                'pid' => 4,
            ],
            [
                Connection::PARAM_STR,
                Connection::PARAM_STR,
                Connection::PARAM_STR,
                Connection::PARAM_INT,
                Connection::PARAM_STR,
                Connection::PARAM_STR,
                Connection::PARAM_INT,
            ]
        );
        $typo3Player = $connection->select(
            ['*'],
            'fe_users',
            [
                'google_id' => $this->player->getGoogleInfo()->getId(),
            ],
        )
            ->fetchAllAssociative();
    }

    /**
     * Garbage collection for fe_sessions (with a probability)
     */
    protected function sessionGarbageCollection(): void
    {
        UserSessionManager::create('FE')->collectGarbage();
    }

    /**
     * @throws IllegalObjectTypeException
     * @throws Exception
     */
    private function registrationFrontendUser(ServerRequestInterface &$serverRequest, RequestHandlerInterface $requestHandler): ResponseInterface
    {
        $response = null;
        $frontendUser = null;
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('fe_users');
        $typo3Player = $connectionPool->select(
            ['*'],
            'fe_users',
            [
                'google_id' => $this->player->getGoogleInfo()->getId(),
            ],
        )->fetchAssociative();
        if (! $typo3Player) {
            $this->addFrontendUserIfNotExist($typo3Player, $connectionPool);
        }

        $frontendUser = GeneralUtility::makeInstance(FrontendUserAuthentication::class);
        $frontendUser->formfield_status = 'login';
        $frontendUser->start($serverRequest);
        $frontendUser->createUserSession($typo3Player);
        $frontendUser->fetchGroupData($serverRequest);

        $this->context->setAspect('frontend.user', $frontendUser->createUserAspect());

        $serverRequest = $serverRequest->withAttribute('frontend.user', $frontendUser);
        dd($this->context->getAspect('frontend.user'));
        $response = $requestHandler->handle($serverRequest);
        $frontendUser->storeSessionData();
        $response = $frontendUser->appendCookieToResponse($response);
        // Collect garbage in Frontend requests, which aren't fully cacheable (e.g. with cookies)
        if ($response->hasHeader('Set-Cookie')) {
            $this->sessionGarbageCollection();
        }

        return $response;
    }
}

//
//
//        dd($google_account_info);
//        $email = $google_account_info->email;
//        $name = $google_account_info->name;
//
//$frontendUser = GeneralUtility::makeInstance(FrontendUserAuthentication::class);
//
//        // Rate Limiting
//        $rateLimiter = $this->ensureLoginRateLimit($frontendUser, $request);
//
//        // Authenticate now
//        $frontendUser->start($request);
//        // no matter if we have an active user we try to fetch matching groups which can
//        // be set without an user (simulation for instance!)
//        $frontendUser->fetchGroupData($request);
//
//        // Register the frontend user as aspect and within the request
//        $this->context->setAspect('frontend.user', $frontendUser->createUserAspect());
//        $request = $request->withAttribute('frontend.user', $frontendUser);
//
//        if ($this->context->getAspect('frontend.user')->isLoggedIn() && $rateLimiter) {
//            $rateLimiter->reset();
//        }
//
//        $response = $handler->handle($request);
//
//        // Store session data for fe_users if it still exists
//        if ($frontendUser instanceof FrontendUserAuthentication) {
//            $frontendUser->storeSessionData();
//            $response = $frontendUser->appendCookieToResponse($response);
//            // Collect garbage in Frontend requests, which aren't fully cacheable (e.g. with cookies)
//            if ($response->hasHeader('Set-Cookie')) {
//                $this->sessionGarbageCollection();
//            }
//        }
//
//        return $response;
