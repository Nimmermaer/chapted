<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
if (!isset($GLOBALS['TCA']['fe_users']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile']);
	}
 
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['fe_users']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_chapted_fe_users = [];
	$tempColumnstx_chapted_fe_users[$GLOBALS['TCA']['fe_users']['ctrl']['type']] = ['exclude' => 1, 'label'   => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted.tx_extbase_type', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'items' => [['Player', 'Tx_Chapted_Player']], 'default' => 'Tx_Chapted_Player', 'size' => 1, 'maxitems' => 1]];
	ExtensionManagementUtility::addTCAcolumns('fe_users', $tempColumnstx_chapted_fe_users);
}

ExtensionManagementUtility::addToAllTCAtypes(
	'fe_users',
	$GLOBALS['TCA']['fe_users']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['fe_users']['ctrl']['label']
);

$tmp_chapted_columns = ['wins' => ['exclude' => 1, 'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player.wins', 'config' => ['type' => 'input', 'size' => 30, 'eval' => 'trim']], 'lose' => ['exclude' => 1, 'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player.lose', 'config' => ['type' => 'input', 'size' => 30, 'eval' => 'trim']], 'custom_color' => ['exclude' => 1, 'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player.custom_color', 'config' => ['type' => 'input', 'size' => 30, 'eval' => 'trim']], 'custom_profil' => ['exclude' => 1, 'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player.custom_profil', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'items' => [['-- Label --', 0]], 'size' => 1, 'maxitems' => 1, 'eval' => '']], 'challenges' => ['exclude' => 1, 'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player.challenges', 'config' => ['type' => 'inline', 'foreign_table' => 'tx_chapted_domain_model_challenge', 'foreign_field' => 'player', 'maxitems' => 9999, 'appearance' => ['collapseAll' => 0, 'levelLinksPosition' => 'top', 'showSynchronizationLink' => 1, 'showPossibleLocalizationRecords' => 1, 'showAllLocalizationLink' => 1]]]];

$tmp_chapted_columns['move'] = ['config' => ['type' => 'passthrough']];
$tmp_chapted_columns['challenge'] = ['config' => ['type' => 'passthrough']];

ExtensionManagementUtility::addTCAcolumns('fe_users',$tmp_chapted_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
	$GLOBALS['TCA']['fe_users']['types']['Tx_Chapted_Player']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_users']['types'])) {
	// use first entry in types array
	$fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
	$GLOBALS['TCA']['fe_users']['types']['Tx_Chapted_Player']['showitem'] = $fe_users_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['fe_users']['types']['Tx_Chapted_Player']['showitem'] = '';
}

$GLOBALS['TCA']['fe_users']['types']['Tx_Chapted_Player']['showitem'] .= ',--div--;LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player,';
$GLOBALS['TCA']['fe_users']['types']['Tx_Chapted_Player']['showitem'] .= 'wins, lose, custom_color, custom_profil, challenges';

$GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = ['LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_Chapted_Player', 'Tx_Chapted_Player'];

ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);
