<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Middlewares;

use ChaptedTeam\Chapted\Domain\Model\Player;
use ChaptedTeam\Chapted\Domain\Repository\PlayerRepository;
use Google\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Frontend\Authentication\FrontendUserAuthentication;

class GoogleFrontendLoginMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly Client $client,
        protected Player $player
    ) {
    }

    public function process(
        ServerRequestInterface $serverRequest,
        RequestHandlerInterface $requestHandler
    ): ResponseInterface {
        if (($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['chapted']['google']['clientID'] ?? false) && ($serverRequest->getQueryParams()['code'] ?? false)) {
            $this->getGoogleAccountInformation($serverRequest->getQueryParams()['code']);
            $this->userAuthentication();
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
     * @throws IllegalObjectTypeException
     */
    private function userAuthentication(): never
    {
        $this->registerUserIfNotExist();
        $frontendUser = GeneralUtility::makeInstance(FrontendUserAuthentication::class);
        dd($frontendUser);
    }

    /**
     * @throws IllegalObjectTypeException
     */
    private function registerUserIfNotExist(): void
    {
        $playerRepository = GeneralUtility::makeInstance(PlayerRepository::class);
        $typo3Player = $playerRepository->findByGoogleId($this->player->getGoogleInfo()->getId());
        if (! $typo3Player) {
            $this->player
                ->setEmail($this->player->getGoogleInfo()->getEmail())
                ->setGoogleId($this->player->getGoogleInfo()->getId())
                ->setName($this->player->getGoogleInfo()->getName());
            $playerRepository->add($this->player);
            GeneralUtility::makeInstance(PersistenceManager::class)->persistAll();
            $typo3Player = $playerRepository->findByGoogleId($this->player->getGoogleId());
        }

        $this->player = $typo3Player;
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
