<?php

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
    ],
];
