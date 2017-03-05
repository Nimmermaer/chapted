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
 * Move
 */
class Move extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * media
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $media = null;
    
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
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChaptedTeam\Chapted\Domain\Model\Player>
     * @cascade remove
     */
    protected $player = null;
    
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
        $this->player = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the media
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $media
     */
    public function getMedia()
    {
        return $this->media;
    }
    
    /**
     * Sets the media
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $media
     * @return void
     */
    public function setMedia(\TYPO3\CMS\Extbase\Domain\Model\FileReference $media)
    {
        $this->media = $media;
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
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
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
     * @return void
     */
    public function setPoint($point)
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
     * 
     * @param int $field
     * @return void
     */
    public function setField($field)
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
     * 
     * @param int $likeMove
     * @return void
     */
    public function setLikeMove($likeMove)
    {
        $this->likeMove = $likeMove;
    }
    
    /**
     * Adds a Player
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Player $player
     * @return void
     */
    public function addPlayer(\ChaptedTeam\Chapted\Domain\Model\Player $player)
    {
        $this->player->attach($player);
    }
    
    /**
     * Removes a Player
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Player $playerToRemove The Player to be removed
     * @return void
     */
    public function removePlayer(\ChaptedTeam\Chapted\Domain\Model\Player $playerToRemove)
    {
        $this->player->detach($playerToRemove);
    }
    
    /**
     * Returns the player
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChaptedTeam\Chapted\Domain\Model\Player> $player
     */
    public function getPlayer()
    {
        return $this->player;
    }
    
    /**
     * Sets the player
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChaptedTeam\Chapted\Domain\Model\Player> $player
     * @return void
     */
    public function setPlayer(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $player)
    {
        $this->player = $player;
    }

}