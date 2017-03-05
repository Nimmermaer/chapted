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
 * Table
 */
class Table extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * month
     * 
     * @var \DateTime
     */
    protected $month = null;
    
    /**
     * year
     * 
     * @var \DateTime
     */
    protected $year = null;
    
    /**
     * challenges
     * 
     * @var \ChaptedTeam\Chapted\Domain\Model\Challenge
     */
    protected $challenges = null;
    
    /**
     * Returns the month
     * 
     * @return \DateTime $month
     */
    public function getMonth()
    {
        return $this->month;
    }
    
    /**
     * Sets the month
     * 
     * @param \DateTime $month
     * @return void
     */
    public function setMonth(\DateTime $month)
    {
        $this->month = $month;
    }
    
    /**
     * Returns the year
     * 
     * @return \DateTime $year
     */
    public function getYear()
    {
        return $this->year;
    }
    
    /**
     * Sets the year
     * 
     * @param \DateTime $year
     * @return void
     */
    public function setYear(\DateTime $year)
    {
        $this->year = $year;
    }
    
    /**
     * Returns the challenges
     * 
     * @return \ChaptedTeam\Chapted\Domain\Model\Challenge $challenges
     */
    public function getChallenges()
    {
        return $this->challenges;
    }
    
    /**
     * Sets the challenges
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Challenge $challenges
     * @return void
     */
    public function setChallenges(\ChaptedTeam\Chapted\Domain\Model\Challenge $challenges)
    {
        $this->challenges = $challenges;
    }

}