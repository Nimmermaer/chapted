<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Utilities;

use ChaptedTeam\Chapted\Domain\Model\FileReference;
use ChaptedTeam\Chapted\Domain\Model\Move;
use TYPO3\CMS\Core\Resource\Driver\LocalDriver;
use TYPO3\CMS\Core\Resource\Exception\ExistingTargetFileNameException;
use TYPO3\CMS\Core\Resource\Exception\InvalidFileNameException;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Resource\StorageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class Base64FileExtractor
{
    /**
     * @throws ExistingTargetFileNameException
     * @throws InvalidFileNameException
     */
    public static function getFileReferenceFromBase64(string $base64Content, Move $move): FileReference
    {
        $storageRepository = GeneralUtility::makeInstance(StorageRepository::class);
        $resourceStorage = $storageRepository->getDefaultStorage();
        [, $data] = explode(';base64,', $base64Content);
        $tempName = microtime();
        file_put_contents('/tmp/' . $tempName . '.png', base64_decode($data, true));
        /** @var File $file */
        $file = $resourceStorage->addFile(
            '/tmp/' . $tempName . '.png',
            $resourceStorage->getRootLevelFolder(),
            (new LocalDriver())->sanitizeFileName($move->getDescription()) . time() . '.png'
        );

        $fileReference = new FileReference();
        $fileReference->setOriginalResource($file);
        return $fileReference;
    }
}
