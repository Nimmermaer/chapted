<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use ChaptedTeam\Chapted\Controller\ChallengeController;

use ChaptedTeam\Chapted\Controller\MoveController;
use ChaptedTeam\Chapted\Controller\PlayerController;
use ChaptedTeam\Chapted\Controller\TableController;
use ChaptedTeam\Chapted\Service\GoogleAuthenticationService;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

ExtensionUtility::configurePlugin(
    'Chapted',
    'Table',
    [
        TableController::class => 'list, show, filter, new',
        MoveController::class => 'like',
    ],
    // non-cacheable actions
    [
        TableController::class => 'list, show, filter, new',
        MoveController::class => 'like',
    ]
);

ExtensionUtility::configurePlugin(
    'Chapted',
    'Profile',
    [
        PlayerController::class => 'new, show, edit, sendNotificationMail, sendInviteMail',
        MoveController::class => 'delete',
    ],
    // non-cacheable actions
    [
        PlayerController::class => 'new, show, edit, ',
        MoveController::class => 'delete',
    ]
);

ExtensionUtility::configurePlugin(
    'Chapted',
    'Teaser',
    [
        PlayerController::class => 'list',
        MoveController::class => 'list',
        ChallengeController::class => 'list',
    ],
    // non-cacheable actions
    [
        PlayerController::class => 'list',
        MoveController::class => 'list',
        ChallengeController::class => 'list',
    ]
);
ExtensionManagementUtility::addService(
// Extension Key
    'chapted',
    // Service type
    'auth',
    // Service key
    GoogleAuthenticationService::class,
    [
        'serviceSubTypes' => [
            'authUserFE' => 'authUserFE',
            'getUserFE' => 'getUserFE',
            'processLoginDataFE' => 'processLoginDataFE',
        ],
        'title' => 'Google Auth',
        'description' => 'An alternative way to login frontend users',
        'subtype' => 'getUserFE,authUserFE,processLoginDataFE',
        'available' => true,
        'priority' => 60,
        'quality' => 80,
        'os' => '',
        'exec' => '',
        'className' => GoogleAuthenticationService::class,
    ]
);
$GLOBALS['TYPO3_CONF_VARS']['SVCONF'] = [
    'auth' => [
        'setup' => [
            'FE_alwaysFetchUser' => true,
            'FE_alwaysAuthUser' => true,
        ],
    ],
];

