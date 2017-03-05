<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ChaptedTeam.' . $_EXTKEY,
	'Table',
	'Chapted Table '
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ChaptedTeam.' . $_EXTKEY,
	'Profile',
	'Profile'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ChaptedTeam.' . $_EXTKEY,
	'Teaser',
	'Teaser'
);

if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'ChaptedTeam.' . $_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'challenges',	// Submodule key
		'',						// Position
		array(
			'Challenge' => 'list, show, filter, new, create',
			'Player' => 'list, show, new',
			
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_challenges.xlf',
		)
	);

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'chapted');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_chapted_domain_model_move', 'EXT:chapted/Resources/Private/Language/locallang_csh_tx_chapted_domain_model_move.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_chapted_domain_model_move');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_chapted_domain_model_challenge', 'EXT:chapted/Resources/Private/Language/locallang_csh_tx_chapted_domain_model_challenge.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_chapted_domain_model_challenge');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_chapted_domain_model_table', 'EXT:chapted/Resources/Private/Language/locallang_csh_tx_chapted_domain_model_table.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_chapted_domain_model_table');
