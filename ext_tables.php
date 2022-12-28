<?php

use ChaptedTeam\Chapted\Controller\ChallengeController;
use ChaptedTeam\Chapted\Controller\PlayerController;
use ChaptedTeam\Chapted\Controller\TableController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (! defined('TYPO3')) {
    die('Access denied.');
}

ExtensionUtility::registerPlugin(
    'Chapted',
    'Table',
    'Chapted Table '
);

ExtensionUtility::registerPlugin(
    'Chapted',
    'Profile',
    'Profile'
);

ExtensionUtility::registerPlugin(
    'Chapted',
    'Teaser',
    'Teaser'
);

if (TYPO3_MODE === 'BE') {
    /**
     * Registers a Backend Module
     */
    ExtensionUtility::registerModule(
        'Chapted',
        'web',	 // Make module a submodule of 'web'
        'challenges',	// Submodule key
        '',						// Position
        [
            ChallengeController::class => 'list, show, filter, new, create',
            PlayerController::class => 'list, show, new',
            TableController::class => 'list, show, new',
        ],
        [
            'access' => 'user,group',
            'icon' => 'EXT:chapted/ext_icon.gif',
            'labels' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_challenges.xlf',
        ]
    );
}

ExtensionManagementUtility::addStaticFile('chapted', 'Configuration/TypoScript', 'chapted');
