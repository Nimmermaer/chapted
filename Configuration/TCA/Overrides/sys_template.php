<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

call_user_func(static function (): void {
    ExtensionManagementUtility::addStaticFile('chapted', 'Configuration/TypoScript', 'chapted');
    ExtensionManagementUtility::addPageTSConfig('@import "EXT:chapted/Configuration/TsConfig/Page/All.tsconfig"');
});
