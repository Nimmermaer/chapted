<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Domain\Model;

use DateTime;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

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
class Table extends AbstractEntity
{
    /**
     * month
     *
     * @var DateTime
     */
    protected $month;

    /**
     * year
     *
     * @var DateTime
     */
    protected $year;

    /**
     * challenges
     *
     * @var Challenge
     */
    protected $challenges;

    /**
     * Returns the month
     *
     * @return DateTime
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Sets the month
     */
    public function setMonth(DateTime $dateTime): void
    {
        $this->month = $dateTime;
    }

    /**
     * Returns the year
     *
     * @return DateTime
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Sets the year
     */
    public function setYear(DateTime $dateTime): void
    {
        $this->year = $dateTime;
    }

    /**
     * Returns the challenges
     *
     * @return Challenge
     */
    public function getChallenges()
    {
        return $this->challenges;
    }

    /**
     * Sets the challenges
     */
    public function setChallenges(Challenge $challenge): void
    {
        $this->challenges = $challenge;
    }
}
