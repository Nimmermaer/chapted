<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use ChaptedTeam\Chapted\Controller\TableController;
use ChaptedTeam\Chapted\Controller\MoveController;
use ChaptedTeam\Chapted\Controller\PlayerController;
use ChaptedTeam\Chapted\Controller\ChallengeController;
if (!defined('TYPO3')) {
	die('Access denied.');
}

ExtensionUtility::configurePlugin(
	'Chapted',
	'Table',
	[TableController::class => 'list, show, filter, new', MoveController::class => 'like'],
	// non-cacheable actions
	[TableController::class => 'list, show, filter, new', MoveController::class => 'like']
);

ExtensionUtility::configurePlugin(
	'Chapted',
	'Profile',
	[PlayerController::class => 'show, edit, sendNotificationMail, sendInviteMail', MoveController::class => 'delete'],
	// non-cacheable actions
	[PlayerController::class => 'show, edit, ', MoveController::class => 'delete']
);

ExtensionUtility::configurePlugin(
	'Chapted',
	'Teaser',
	[PlayerController::class => 'list', MoveController::class => 'list', ChallengeController::class => 'list'],
	// non-cacheable actions
	[PlayerController::class => 'list', MoveController::class => 'list', ChallengeController::class => 'list']
);
