<?php

declare(strict_types=1);

use ChaptedTeam\Chapted\Domain\Model\Player;

return [
    'TYPO3\CMS\Extbase\Domain\Model\FrontendUser' => [
        'subclasses' => [
            'Player' => Player::class,
        ],
    ],
    Player::class => [
        'recordType' => 'Player',
        'tableName' => 'fe_users',
        'properties' => [
            'wins' => [
                'fieldName' => 'wins',
            ],
            'lose' => [
                'fieldName' => 'lose',
            ],
            'customColor' => [
                'fieldName' => 'custom_color',
            ],
            'customProfil' => [
                'fieldName' => 'custom_profil',
            ],
            'challenges' => [
                'fieldName' => 'challenges',
            ],
        ],
    ],
];
