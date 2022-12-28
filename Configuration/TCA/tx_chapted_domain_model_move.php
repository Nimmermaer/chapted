<?php

use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

return [
    'ctrl' => [
        'title' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_move',
        'label' => 'media',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'media,description,point,field,like_move,player,',
        'iconfile' => 'EXT:chapted/Resources/Public/Icons/move.svg',
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid,--palette--,l10n_parent,l10n_diffsource,hidden,--palette--;;1,media,description,--palette--,point,field,like_move,player,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,starttime,endtime',
        ],
    ],
    'palettes' => [
        '1' => [
            'showitem' => '',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [['', 0]],
                'foreign_table' => 'tx_chapted_domain_model_move',
                'foreign_table_where' => 'AND tx_chapted_domain_model_move.pid=###CURRENT_PID### AND tx_chapted_domain_model_move.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                ],
                'renderType' => 'inputDateTime',
                [
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                ],
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                ],
                'renderType' => 'inputDateTime',
                [
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                ],
            ],
        ],
        'media' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_move.media',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'media',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference',
                    ],
                    'maxitems' => 1,
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
							--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette', ],
                            File::FILETYPE_TEXT => [
                                'showitem' => '
							--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette', ],
                            File::FILETYPE_IMAGE => [
                                'showitem' => '
							--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette', ],
                            File::FILETYPE_AUDIO => [
                                'showitem' => '
							--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette', ],
                            File::FILETYPE_VIDEO => [
                                'showitem' => '
							--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette', ],
                            File::FILETYPE_APPLICATION => [
                                'showitem' => '
							--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette', ],
                        ],
                    ],
                ]
            ),
        ],
        'description' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_move.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                        'options' => [
                            'title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext.W.RTE',
                        ],
                    ],
                ],
            ],
        ],
        'point' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_move.point',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
            ],
        ],
        'field' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_move.field',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [['-- Label --', 0]],
                'size' => 1,
                'maxitems' => 1,
                'eval' => '',
            ],
        ],
        'like_move' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_move.like_move',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
            ],
        ],
        'player' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_move.player',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'fe_users',
                'foreign_field' => 'move',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                ],
            ],
        ],
        'challenge' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
