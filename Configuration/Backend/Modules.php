<?php

declare(strict_types=1);

use ChaptedTeam\Chapted\Controller\BackendController;

return [
    'web_ChaptedChallenges' => [
        'parent' => 'web',
        'position' => [
            'after' => 'web_info',
        ],
        'access' => 'user,group',
        'workspaces' => 'live',
        'iconIdentifier' => 'module-challenges',
        'path' => '/module/web/chaptedChallenges',
        'labels' => 'LLL:EXT:chapted/Resources/Private/Language/locallang_challenges.xlf',
        'extensionName' => 'Chapted',
        'controllerActions' => [
            BackendController::class => [
                'list',
            ],
        ],
    ],
];
