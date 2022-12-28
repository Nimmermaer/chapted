<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Domain\Model;

use DateTime;
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
 * Table
 */
class Table extends AbstractEntity
{
    /**
     * month
     *
     * @var DateTime
     */
    protected \DateTime $month;

    /**
     * year
     *
     * @var DateTime
     */
    protected \DateTime $year;

    /**
     * challenges
     *
     * @var Challenge
     */
    protected Challenge $challenge;

    /**
     * @return DateTime
     */
    public function getMonth(): DateTime
    {
        return $this->month;
    }

    /**
     * @param DateTime $month
     */
    public function setMonth(DateTime $month): void
    {
        $this->month = $month;
    }

    /**
     * @return DateTime
     */
    public function getYear(): DateTime
    {
        return $this->year;
    }

    /**
     * @param DateTime $year
     */
    public function setYear(DateTime $year): void
    {
        $this->year = $year;
    }

    /**
     * @return Challenge
     */
    public function getChallenge(): Challenge
    {
        return $this->challenge;
    }

    /**
     * @param Challenge $challenge
     */
    public function setChallenge(Challenge $challenge): void
    {
        $this->challenge = $challenge;
    }
}
