<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Domain\Model;

use ChaptedTeam\Chapted\Domain\Validator\ProfanityValidator;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Validation\Validator\NotEmptyValidator;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Michael Blunck <mi.blunck@gmail.com>
 *           Mirco Winkler <mirco.winkler@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Move
 */
class Move extends AbstractEntity
{
    /**
     * media
     */
    protected ?FileReference $media = null;

    #[Extbase\Validate([
        'validator' => NotEmptyValidator::class,
    ])] #[Extbase\Validate([
        'validator' => ProfanityValidator::class,
    ])]
    protected string $description = '';

    /**
     * point
     */
    protected int $point = 0;

    /**
     * field
     */
    protected int $field = 0;

    /**
     * likeMove
     */
    protected int $likeMove = 0;

    /**
     * player
     *
     * @var ObjectStorage<Player>
     * @Extbase\ORM\Cascade("remove")
     */
    protected ObjectStorage $player;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    public function getMedia(): ?FileReference
    {
        return $this->media;
    }

    public function setMedia(?FileReference $fileReference): void
    {
        $this->media = $fileReference;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPoint(): int
    {
        return $this->point;
    }

    public function setPoint(int $point): void
    {
        $this->point = $point;
    }

    public function getField(): int
    {
        return $this->field;
    }

    public function setField(int $field): void
    {
        $this->field = $field;
    }

    public function getLikeMove(): int
    {
        return $this->likeMove;
    }

    public function setLikeMove(int $likeMove): void
    {
        $this->likeMove = $likeMove;
    }

    public function getPlayer(): ObjectStorage
    {
        return $this->player;
    }

    public function setPlayer(ObjectStorage $objectStorage): void
    {
        $this->player = $objectStorage;
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     */
    protected function initStorageObjects()
    {
        $this->player = new ObjectStorage();
    }
}
