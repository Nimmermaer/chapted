<?php

use ChaptedTeam\Chapted\Controller\ChallengeController;
use ChaptedTeam\Chapted\Controller\PlayerController;
use ChaptedTeam\Chapted\Controller\TableController;
return [
    'web_ChaptedChallenges' => [
        'parent' => 'web',
        'position' => ['after' => 'web_info'],
        'access' => 'user,group',
        'workspaces' => 'live',
        'iconIdentifier' => 'module-challenges',
        'path' => '/module/web/chaptedChallenges',
        'labels' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_challenges.xlf',
        'extensionName' => 'Chapted',
        'controllerActions' => [
            ChallengeController::class => [
                'list, show, filter, new, create',
            ],
            PlayerController::class => [
                'list, show, new',
            ],
            TableController::class => [
                'list, show, new',
            ],
        ],
    ],
];
