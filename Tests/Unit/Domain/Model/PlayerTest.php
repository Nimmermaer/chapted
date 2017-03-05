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
 * Test case for class \ChaptedTeam\Chapted\Domain\Model\Player.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Michael Blunck <mi.blunck@gmail.com>
 * @author Mirco Winkler <mirco.winkler@gmail.com>
 */
class PlayerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ChaptedTeam\Chapted\Domain\Model\Player
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ChaptedTeam\Chapted\Domain\Model\Player();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getWinsReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getWins()
		);
	}

	/**
	 * @test
	 */
	public function setWinsForStringSetsWins()
	{
		$this->subject->setWins('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'wins',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLoseReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLose()
		);
	}

	/**
	 * @test
	 */
	public function setLoseForStringSetsLose()
	{
		$this->subject->setLose('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'lose',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCustomColorReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCustomColor()
		);
	}

	/**
	 * @test
	 */
	public function setCustomColorForStringSetsCustomColor()
	{
		$this->subject->setCustomColor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'customColor',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCustomProfilReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setCustomProfilForIntSetsCustomProfil()
	{	}

	/**
	 * @test
	 */
	public function getChallengesReturnsInitialValueForChallenge()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getChallenges()
		);
	}

	/**
	 * @test
	 */
	public function setChallengesForObjectStorageContainingChallengeSetsChallenges()
	{
		$challenge = new \ChaptedTeam\Chapted\Domain\Model\Challenge();
		$objectStorageHoldingExactlyOneChallenges = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneChallenges->attach($challenge);
		$this->subject->setChallenges($objectStorageHoldingExactlyOneChallenges);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneChallenges,
			'challenges',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addChallengeToObjectStorageHoldingChallenges()
	{
		$challenge = new \ChaptedTeam\Chapted\Domain\Model\Challenge();
		$challengesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$challengesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($challenge));
		$this->inject($this->subject, 'challenges', $challengesObjectStorageMock);

		$this->subject->addChallenge($challenge);
	}

	/**
	 * @test
	 */
	public function removeChallengeFromObjectStorageHoldingChallenges()
	{
		$challenge = new \ChaptedTeam\Chapted\Domain\Model\Challenge();
		$challengesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$challengesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($challenge));
		$this->inject($this->subject, 'challenges', $challengesObjectStorageMock);

		$this->subject->removeChallenge($challenge);

	}
}
