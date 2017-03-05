<?php
namespace ChaptedTeam\Chapted\Domain\Model;

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
class Player extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
{

    /**
     * wins
     * 
     * @var string
     */
    protected $wins = '';
    
    /**
     * lose
     * 
     * @var string
     */
    protected $lose = '';
    
    /**
     * customColor
     * 
     * @var string
     */
    protected $customColor = '';
    
    /**
    * normal
    male
    female
    * 
    * @var int
    */
    protected $customProfil = 0;
    
    /**
     * challenges
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChaptedTeam\Chapted\Domain\Model\Challenge>
     * @cascade remove
     */
    protected $challenges = null;
    
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
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->challenges = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the wins
     * 
     * @return string $wins
     */
    public function getWins()
    {
        return $this->wins;
    }
    
    /**
     * Sets the wins
     * 
     * @param string $wins
     * @return void
     */
    public function setWins($wins)
    {
        $this->wins = $wins;
    }
    
    /**
     * Returns the lose
     * 
     * @return string $lose
     */
    public function getLose()
    {
        return $this->lose;
    }
    
    /**
     * Sets the lose
     * 
     * @param string $lose
     * @return void
     */
    public function setLose($lose)
    {
        $this->lose = $lose;
    }
    
    /**
     * Returns the customColor
     * 
     * @return string $customColor
     */
    public function getCustomColor()
    {
        return $this->customColor;
    }
    
    /**
     * Sets the customColor
     * 
     * @param string $customColor
     * @return void
     */
    public function setCustomColor($customColor)
    {
        $this->customColor = $customColor;
    }
    
    /**
     * Returns the customProfil
     * 
     * @return int $customProfil
     */
    public function getCustomProfil()
    {
        return $this->customProfil;
    }
    
    /**
     * Sets the customProfil
     * 
     * @param int $customProfil
     * @return void
     */
    public function setCustomProfil($customProfil)
    {
        $this->customProfil = $customProfil;
    }
    
    /**
     * Adds a Challenge
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Challenge $challenge
     * @return void
     */
    public function addChallenge(\ChaptedTeam\Chapted\Domain\Model\Challenge $challenge)
    {
        $this->challenges->attach($challenge);
    }
    
    /**
     * Removes a Challenge
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Challenge $challengeToRemove The Challenge to be removed
     * @return void
     */
    public function removeChallenge(\ChaptedTeam\Chapted\Domain\Model\Challenge $challengeToRemove)
    {
        $this->challenges->detach($challengeToRemove);
    }
    
    /**
     * Returns the challenges
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChaptedTeam\Chapted\Domain\Model\Challenge> $challenges
     */
    public function getChallenges()
    {
        return $this->challenges;
    }
    
    /**
     * Sets the challenges
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChaptedTeam\Chapted\Domain\Model\Challenge> $challenges
     * @return void
     */
    public function setChallenges(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $challenges)
    {
        $this->challenges = $challenges;
    }

}