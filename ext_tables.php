<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use ChaptedTeam\Chapted\Controller\ChallengeController;
use ChaptedTeam\Chapted\Controller\PlayerController;
use ChaptedTeam\Chapted\Controller\TableController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
if (!defined('TYPO3')) {
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
		[ChallengeController::class => 'list, show, filter, new, create', PlayerController::class => 'list, show, new', TableController::class => 'list, show, new'],
		['access' => 'user,group', 'icon'   => 'EXT:chapted/ext_icon.gif', 'labels' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_challenges.xlf']
	);

}

ExtensionManagementUtility::addStaticFile('chapted', 'Configuration/TypoScript', 'chapted');

ExtensionManagementUtility::addLLrefForTCAdescr('tx_chapted_domain_model_move', 'EXT:chapted/Resources/Private/Language/locallang_csh_tx_chapted_domain_model_move.xlf');
ExtensionManagementUtility::allowTableOnStandardPages('tx_chapted_domain_model_move');

ExtensionManagementUtility::addLLrefForTCAdescr('tx_chapted_domain_model_challenge', 'EXT:chapted/Resources/Private/Language/locallang_csh_tx_chapted_domain_model_challenge.xlf');
ExtensionManagementUtility::allowTableOnStandardPages('tx_chapted_domain_model_challenge');

ExtensionManagementUtility::addLLrefForTCAdescr('tx_chapted_domain_model_table', 'EXT:chapted/Resources/Private/Language/locallang_csh_tx_chapted_domain_model_table.xlf');
ExtensionManagementUtility::allowTableOnStandardPages('tx_chapted_domain_model_table');
