<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

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
     *
     * @var FileReference
     */
    protected FileReference $media;

    /**
     * description
     *
     * @var string
     */
    protected string $description = '';

    /**
     * point
     *
     * @var int
     */
    protected int $point = 0;

    /**
     * field
     *
     * @var int
     */
    protected int $field = 0;

    /**
     * likeMove
     *
     * @var int
     */
    protected int $likeMove = 0;

    /**
     * player
     *
     * @var ObjectStorage<Player>
     * @Extbase\ORM\Cascade("remove")
     */
    protected $player;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
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

    /**
     * @return FileReference
     */
    public function getMedia(): FileReference
    {
        return $this->media;
    }

    /**
     * @param FileReference $media
     */
    public function setMedia(FileReference $media): void
    {
        $this->media = $media;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getPoint(): int
    {
        return $this->point;
    }

    /**
     * @param int $point
     */
    public function setPoint(int $point): void
    {
        $this->point = $point;
    }

    /**
     * @return int
     */
    public function getField(): int
    {
        return $this->field;
    }

    /**
     * @param int $field
     */
    public function setField(int $field): void
    {
        $this->field = $field;
    }

    /**
     * @return int
     */
    public function getLikeMove(): int
    {
        return $this->likeMove;
    }

    /**
     * @param int $likeMove
     */
    public function setLikeMove(int $likeMove): void
    {
        $this->likeMove = $likeMove;
    }

    /**
     * @return ObjectStorage
     */
    public function getPlayer(): ObjectStorage
    {
        return $this->player;
    }

    /**
     * @param ObjectStorage $player
     */
    public function setPlayer(ObjectStorage $player): void
    {
        $this->player = $player;
    }

}
