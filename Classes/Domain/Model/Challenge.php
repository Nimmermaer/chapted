<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Domain\Model;

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
 * Challenge
 */
class Challenge extends AbstractEntity
{
    /**
     * title
     *
     * @var string
     * @Extbase\Validate("NotEmpty")
     */
    protected string $title = '';

    /**
     * description
     *
     * @var string
     * @Extbase\Validate("NotEmpty")
     */
    protected string $description = '';

    /**
     * reckoning
     *
     * @var string
     */
    protected string $reckoning = '';

    /**
     * likes
     *
     * @var int
     */
    protected int $likes = 0;

    /**
     * winningPoint
     *
     * @var string
     */
    protected string $winningPoint = '';

    /**
     * qrCode
     *
     * @var string
     */
    protected string $qrCode = '';

    /**
     * latitude
     *
     * @var string
     */
    protected string $latitude = '';

    /**
     * longitude
     *
     * @var string
     */
    protected string $longitude = '';

    /**
     * moves
     *
     * @var ObjectStorage<Move>
     * @Extbase\ORM\Cascade("remove")
     */
    protected ObjectStorage $moves;

    /**
     * owner
     *
     * @var ObjectStorage<Player>
     * @Extbase\ORM\Cascade("remove")
     */
    protected ObjectStorage $owner;

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
        $this->moves = new ObjectStorage();
        $this->owner = new ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Sets the title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription(): string
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
     * Returns the reckoning
     *
     * @return string
     */
    public function getReckoning(): string
    {
        return $this->reckoning;
    }

    /**
     * Sets the reckoning
     */
    public function setReckoning(string $reckoning): void
    {
        $this->reckoning = $reckoning;
    }

    /**
     * Returns the likes
     *
     * @return int
     */
    public function getLikes(): int
    {
        return $this->likes;
    }

    /**
     * Sets the likes
     */
    public function setLikes(int $likes): void
    {
        $this->likes = $likes;
    }

    /**
     * Returns the winningPoint
     *
     * @return string
     */
    public function getWinningPoint(): string
    {
        return $this->winningPoint;
    }

    /**
     * Sets the winningPoint
     */
    public function setWinningPoint(string $winningPoint): void
    {
        $this->winningPoint = $winningPoint;
    }

    /**
     * Returns the qrCode
     *
     * @return string
     */
    public function getQrCode(): string
    {
        return $this->qrCode;
    }

    /**
     * Sets the qrCode
     */
    public function setQrCode(string $qrCode): void
    {
        $this->qrCode = $qrCode;
    }

    /**
     * Returns the latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Sets the latitude
     */
    public function setLatitude(string $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * Returns the longitude
     *
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }

    /**
     * Sets the longitude
     */
    public function setLongitude(string $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * Adds a Move
     */
    public function addMove(Move $move): void
    {
        $this->moves->attach($move);
    }

    /**
     * Removes a Move
     *
     * @param Move $move The Move to be removed
     */
    public function removeMove(Move $move): void
    {
        $this->moves->detach($move);
    }

    /**
     * Returns the moves
     *
     * @return ObjectStorage<Move> $moves
     */
    public function getMoves(): ObjectStorage
    {
        return $this->moves;
    }

    /**
     * Sets the moves
     *
     * @param ObjectStorage<Move> $objectStorage
     */
    public function setMoves(ObjectStorage $objectStorage): void
    {
        $this->moves = $objectStorage;
    }

    /**
     * Adds a Player
     */
    public function addOwner(Player $player): void
    {
        $this->owner->attach($player);
    }

    /**
     * Removes a Player
     *
     * @param Player $player The Player to be removed
     */
    public function removeOwner(Player $player): void
    {
        $this->owner->detach($player);
    }

    /**
     * Returns the owner
     *
     * @return ObjectStorage<Player> $owner
     */
    public function getOwner(): ObjectStorage
    {
        return $this->owner;
    }

    /**
     * Sets the owner
     *
     * @param ObjectStorage<Player> $objectStorage
     */
    public function setOwner(ObjectStorage $objectStorage): void
    {
        $this->owner = $objectStorage;
    }
}
