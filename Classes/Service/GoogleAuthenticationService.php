<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Service;

use Google\Client;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use TYPO3\CMS\Core\Authentication\AbstractAuthenticationService;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Session\UserSession;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class GoogleAuthenticationService extends AbstractAuthenticationService implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    private array $configuration = [];

    private \Google_Service_Oauth2 $googleServiceOauth2;

    public function __construct(
        private readonly Client $client
    ) {
        $this->db_user = [
            'table' => 'fe_users',
            'userid_column' => 'uid',
            'username_column' => 'username',
            'userident_column' => 'google_id',
            'enable_clause' => 'disable != 1 AND deleted = 0',
        ];
        $this->configuration = [
            'clientID' => $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['chapted']['google']['clientID'],
            'redirectUri' => $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['chapted']['google']['redirectUri'],
            'clientSecret' => $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['chapted']['google']['clientSecret'],
        ];
    }

    public function init(): bool
    {
        return ($this->configuration['clientID'] ?? false) && ($_REQUEST['code'] ?? false);
    }

    public function getUser(): array
    {
        $this->googleServiceOauth2 = $this->getGoogleAccountInformation($_REQUEST['code']);
        $user = $this->fetchUserRecord((string) $this->googleServiceOauth2->userinfo_v2_me->get()['id']);
        if ($user) {
            $this->pObj->createUserSession($user);
            return $user;
        }

        return [];
    }

    /**
     * @throws \JsonException
     */
    public function authUser(array $user): int
    {
        if ($user === []) {
            self::createNewFrontendUser();
            $this->logger->info('Create New user with Google: ');
            return 200;
        }

        return 100;
    }

    private function createNewFrontendUser(): UserSession
    {
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable($this->db_user['table']);
        $connection->insert(
            'fe_users',
            [
                'tx_extbase_type' => 'Player',
                'name' => $this->googleServiceOauth2->userinfo_v2_me->get()['name'],
                'email' => $this->googleServiceOauth2->userinfo_v2_me->get()['email'],
                'google_id' => $this->googleServiceOauth2->userinfo_v2_me->get()['id'],
                'username' => $this->googleServiceOauth2->userinfo_v2_me->get()['id'],
                'google_info' => json_encode(
                    (array) $this->googleServiceOauth2->userinfo_v2_me,
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
        $user = $connection->select(
            ['*'],
            'fe_users',
            [
                'uid' => (int) $connection->lastInsertId('fe_users'),
            ]
        )->fetchAssociative();
        return $this->pObj->createUserSession($user);
    }

    private function getGoogleAccountInformation($token): \Google_Service_Oauth2
    {
        $this->client->setClientId($this->configuration['clientID']);
        $this->client->setClientSecret($this->configuration['clientSecret']);
        $this->client->setRedirectUri($this->configuration['redirectUri']);
        $this->client->addScope('email');
        $this->client->addScope('profile');

        $accessToken = $this->client->fetchAccessTokenWithAuthCode($token);
        $this->client->setAccessToken($accessToken['access_token']);

        // get profile info
        return new \Google_Service_Oauth2($this->client);
    }
}
