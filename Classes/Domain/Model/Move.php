<?php

namespace ChaptedTeam\Chapted\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;
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
    protected $media;

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * point
     *
     * @var int
     */
    protected $point = 0;

    /**
     * field
     *
     * @var int
     */
    protected $field = 0;

    /**
     * likeMove
     *
     * @var int
     */
    protected $likeMove = 0;

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
     * Returns the media
     *
     * @return FileReference $media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Sets the media
     */
    public function setMedia(FileReference $fileReference): void
    {
        $this->media = $fileReference;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns the point
     *
     * @return int $point
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Sets the point
     *
     * @param string $point
     */
    public function setPoint($point): void
    {
        $this->point = $point;
    }

    /**
     * Returns the field
     *
     * @return int $field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Sets the field
     */
    public function setField(int $field): void
    {
        $this->field = $field;
    }

    /**
     * Returns the likeMove
     *
     * @return int $likeMove
     */
    public function getLikeMove()
    {
        return $this->likeMove;
    }

    /**
     * Sets the likeMove
     */
    public function setLikeMove(int $likeMove): void
    {
        $this->likeMove = $likeMove;
    }

    /**
     * Adds a Player
     */
    public function addPlayer(Player $player): void
    {
        $this->player->attach($player);
    }

    /**
     * Removes a Player
     *
     * @param Player $player The Player to be removed
     */
    public function removePlayer(Player $player): void
    {
        $this->player->detach($player);
    }

    /**
     * Returns the player
     *
     * @return ObjectStorage<Player> $player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Sets the player
     *
     * @param ObjectStorage<Player> $objectStorage
     */
    public function setPlayer(ObjectStorage $objectStorage): void
    {
        $this->player = $objectStorage;
    }
}
