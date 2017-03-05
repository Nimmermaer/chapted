<?php

namespace ChaptedTeam\Chapted\Tests\Unit\Domain\Model;

/***************************************************************
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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \ChaptedTeam\Chapted\Domain\Model\Table.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Michael Blunck <mi.blunck@gmail.com>
 * @author Mirco Winkler <mirco.winkler@gmail.com>
 */
class TableTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ChaptedTeam\Chapted\Domain\Model\Table
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ChaptedTeam\Chapted\Domain\Model\Table();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getMonthReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getMonth()
		);
	}

	/**
	 * @test
	 */
	public function setMonthForDateTimeSetsMonth()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setMonth($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'month',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getYearReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getYear()
		);
	}

	/**
	 * @test
	 */
	public function setYearForDateTimeSetsYear()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setYear($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'year',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getChallengesReturnsInitialValueForChallenge()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getChallenges()
		);
	}

	/**
	 * @test
	 */
	public function setChallengesForChallengeSetsChallenges()
	{
		$challengesFixture = new \ChaptedTeam\Chapted\Domain\Model\Challenge();
		$this->subject->setChallenges($challengesFixture);

		$this->assertAttributeEquals(
			$challengesFixture,
			'challenges',
			$this->subject
		);
	}
}
