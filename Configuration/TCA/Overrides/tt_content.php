<?php

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
        'Profile',
        'Profile'
    );

    ExtensionUtility::registerPlugin(
        'Chapted',
        'Teaser',
        'Teaser'
    );

});
