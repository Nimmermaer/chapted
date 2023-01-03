<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Domain\Model;

use TYPO3\CMS\Core\Resource\ResourceInterface;

class FileReference extends \TYPO3\CMS\Extbase\Domain\Model\FileReference
{
    /**
     * Uid of a sys_file
     *
     * @var int
     */
    protected $originalFileIdentifier;

    public function setOriginalResource(ResourceInterface $originalResource): void
    {
        $this->setFileReference($originalResource);
    }

    private function setFileReference(ResourceInterface $originalResource): void
    {
        $this->originalResource = $originalResource;
        $this->originalFileIdentifier = (int) $this->originalResource->getProperty('uid');
        $this->uidLocal = (int) $this->originalResource->getProperty('uid');
    }
}
