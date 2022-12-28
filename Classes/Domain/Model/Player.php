<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Domain\Model;

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
 * Player
 */
class Player
{
    /**
     * wins
     *
     * @var string
     */
    protected string $wins = '';

    /**
     * lose
     *
     * @var string
     */
    protected string $lose = '';

    /**
     * customColor
     *
     * @var string
     */
    protected string $customColor = '';

    /**
     * normal
     *
     * @var int
     */
    protected int $customProfil = 0;

    /**
     * challenges
     *
     * @var ObjectStorage<Challenge>
     * @Extbase\ORM\Cascade("remove")
     */
    protected ObjectStorage $challenges;

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
        $this->challenges = new ObjectStorage();
    }

    /**
     * @return string
     */
    public function getWins(): string
    {
        return $this->wins;
    }

    /**
     * @param string $wins
     */
    public function setWins(string $wins): void
    {
        $this->wins = $wins;
    }

    /**
     * @return string
     */
    public function getLose(): string
    {
        return $this->lose;
    }

    /**
     * @param string $lose
     */
    public function setLose(string $lose): void
    {
        $this->lose = $lose;
    }

    /**
     * @return string
     */
    public function getCustomColor(): string
    {
        return $this->customColor;
    }

    /**
     * @param string $customColor
     */
    public function setCustomColor(string $customColor): void
    {
        $this->customColor = $customColor;
    }

    /**
     * @return int
     */
    public function getCustomProfil(): int
    {
        return $this->customProfil;
    }

    /**
     * @param int $customProfil
     */
    public function setCustomProfil(int $customProfil): void
    {
        $this->customProfil = $customProfil;
    }

    /**
     * @return ObjectStorage
     */
    public function getChallenges(): ObjectStorage
    {
        return $this->challenges;
    }

    /**
     * @param ObjectStorage $challenges
     */
    public function setChallenges(ObjectStorage $challenges): void
    {
        $this->challenges = $challenges;
    }

}
