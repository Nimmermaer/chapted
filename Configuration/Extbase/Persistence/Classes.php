<?php

declare(strict_types=1);
use ChaptedTeam\Chapted\Domain\Model\FileReference;

use ChaptedTeam\Chapted\Domain\Model\Player;

return [
    FileReference::class => [
        'tableName' => 'sys_file_reference',
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
