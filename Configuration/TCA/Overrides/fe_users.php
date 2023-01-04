<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

call_user_func(static function (): void {
    if (! isset($GLOBALS['TCA']['fe_users']['ctrl']['type'])) {
        // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
        $GLOBALS['TCA']['fe_users']['ctrl']['type'] = 'tx_extbase_type';
        ExtensionManagementUtility::addTCAcolumns('fe_users', [
            'tx_extbase_type' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted.tx_extbase_type',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [['Player', 'Player']],
                    'default' => 'Player',
                    'size' => 1,
                    'maxitems' => 1,
                ],
            ],
        ]);
    }

    ExtensionManagementUtility::addToAllTCAtypes(
        'fe_users',
        $GLOBALS['TCA']['fe_users']['ctrl']['type'],
        '',
        'after:' . $GLOBALS['TCA']['fe_users']['ctrl']['label']
    );

    ExtensionManagementUtility::addTCAcolumns('fe_users', [
        'wins' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player.wins',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'lose' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player.lose',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'custom_color' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player.custom_color',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'custom_profil' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player.custom_profil',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [['-- Label --', 0]],
                'size' => 1,
                'maxitems' => 1,
                'eval' => '',
            ],
        ],
        'challenges' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player.challenges',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chapted_domain_model_challenge',
                'foreign_field' => 'owner',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => true,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                ],
            ],
        ],
        'move' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'google_id' => [
            'exclude' => 1,
            'label' => 'Google Id',
            'config' => [
                'type' => 'input',
                'readOnly' => true,
            ],
        ],
        'google_info' => [
            'exclude' => 1,
            'label' => 'Google Info',
            'config' => [
                'type' => 'text',
                'readOnly' => true,
            ],
        ],
        'challenge' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ]);

    /* inherit and extend the show items from the parent class */

    if (isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
        $GLOBALS['TCA']['fe_users']['types']['Player']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
    } elseif (is_array($GLOBALS['TCA']['fe_users']['types'])) {
        // use first entry in types array
        $fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
        $GLOBALS['TCA']['fe_users']['types']['Player']['showitem'] = $fe_users_type_definition['showitem'];
    } else {
        $GLOBALS['TCA']['fe_users']['types']['Player']['showitem'] = '';
    }

    $GLOBALS['TCA']['fe_users']['types']['Player']['showitem'] .= ',--div--;LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:tx_chapted_domain_model_player,';
    $GLOBALS['TCA']['fe_users']['types']['Player']['showitem'] .= 'google_id, wins, lose, custom_color, custom_profil, challenges';

    $GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = [
        'LLL:EXT:chapted/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Player',
        'Player',
    ];
});
