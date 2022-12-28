<?php

declare(strict_types=1);

use ChaptedTeam\Chapted\Middlewares\GoogleFrontendLoginMiddleware;

return [
    'frontend' => [
        'google-frontend-login' => [
            'target' => GoogleFrontendLoginMiddleware::class,
            'before' => [
                'typo3/cms-frontend/authentication',
            ],
        ],
    ],
];
