<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

call_user_func(static function (): void {
    ExtensionUtility::registerPlugin(
        'Chapted',
        'Table',
        'Chapted Table '
    );

    ExtensionUtility::registerPlugin(
        'Chapted',
        'ProfileNew',
        'Profile:new'
    );

    ExtensionUtility::registerPlugin(
        'Chapted',
        'ProfileShow',
        'Profile:show'
    );

    ExtensionUtility::registerPlugin(
        'Chapted',
        'Teaser',
        'Teaser'
    );
});
