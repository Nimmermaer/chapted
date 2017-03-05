<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_challenge',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,description,reckoning,likes,winning_point,qr_code,latitude,longitude,moves,owner,',
		'iconfile' => 'EXT:chapted/Resources/Public/Icons/challenge.svg'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, description, reckoning, likes, winning_point, qr_code, latitude, longitude, moves, owner',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, description;;;richtext:rte_transform[mode=ts_links], reckoning, likes, winning_point, qr_code, latitude, longitude, moves, owner, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_chapted_domain_model_challenge',
				'foreign_table_where' => 'AND tx_chapted_domain_model_challenge.pid=###CURRENT_PID### AND tx_chapted_domain_model_challenge.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_challenge.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_challenge.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_rte.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'reckoning' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_challenge.reckoning',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'likes' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_challenge.likes',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'winning_point' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_challenge.winning_point',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'qr_code' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_challenge.qr_code',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'latitude' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_challenge.latitude',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'longitude' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_challenge.longitude',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'moves' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_challenge.moves',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_chapted_domain_model_move',
				'foreign_field' => 'challenge',
				'maxitems' => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		'owner' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_challenge.owner',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'fe_users',
				'foreign_field' => 'challenge',
				'maxitems' => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		
		'player' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);