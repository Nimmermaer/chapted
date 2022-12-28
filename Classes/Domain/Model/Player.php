<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Domain\Model;

use Google\Service\Oauth2\Userinfo;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
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
    protected string $username = '';

    protected string $password = '';

    protected string $name = '';

    protected ?FileReference $image = null;

    protected string $email = '';

    protected string $googleId = '';

    protected ?Userinfo $googleInfo = null;

    /**
     * wins
     */
    protected string $wins = '';

    /**
     * lose
     */
    protected string $lose = '';

    /**
     * customColor
     */
    protected string $customColor = '';

    /**
     * normal
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

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getImage(): ?FileReference
    {
        return $this->image;
    }

    public function setImage(?FileReference $fileReference): self
    {
        $this->image = $fileReference;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getGoogleId(): string
    {
        return $this->googleId;
    }

    public function setGoogleId(string $googleId): self
    {
        $this->googleId = $googleId;
        return $this;
    }

    public function getGoogleInfo(): ?Userinfo
    {
        return $this->googleInfo;
    }

    public function setGoogleInfo(?Userinfo $userinfo): self
    {
        $this->googleInfo = $userinfo;
        return $this;
    }

    public function getWins(): string
    {
        return $this->wins;
    }

    public function setWins(string $wins): self
    {
        $this->wins = $wins;
        return $this;
    }

    public function getLose(): string
    {
        return $this->lose;
    }

    public function setLose(string $lose): self
    {
        $this->lose = $lose;
        return $this;
    }

    public function getCustomColor(): string
    {
        return $this->customColor;
    }

    public function setCustomColor(string $customColor): self
    {
        $this->customColor = $customColor;
        return $this;
    }

    public function getCustomProfil(): int
    {
        return $this->customProfil;
    }

    public function setCustomProfil(int $customProfil): self
    {
        $this->customProfil = $customProfil;
        return $this;
    }

    public function getChallenges(): ObjectStorage
    {
        return $this->challenges;
    }

    public function setChallenges(ObjectStorage $objectStorage): self
    {
        $this->challenges = $objectStorage;
        return $this;
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
}
