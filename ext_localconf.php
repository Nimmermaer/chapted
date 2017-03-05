<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ChaptedTeam.' . $_EXTKEY,
	'Table',
	array(
		'Table' => 'list, show, filter, new',
		'Move' => 'like',
		
	),
	// non-cacheable actions
	array(
		'Table' => 'list, show, filter, new',
		'Move' => 'like',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ChaptedTeam.' . $_EXTKEY,
	'Profile',
	array(
		'Player' => 'show, edit, sendNotificationMail, sendInviteMail',
		'Move' => 'delete',
		
	),
	// non-cacheable actions
	array(
		'Player' => 'show, edit, ',
		'Move' => 'delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ChaptedTeam.' . $_EXTKEY,
	'Teaser',
	array(
		'Player' => 'list',
		'Move' => 'list',
		'Challenge' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Player' => 'list',
		'Move' => 'list',
		'Challenge' => 'list',
		
	)
);
