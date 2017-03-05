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
 * Test case for class \ChaptedTeam\Chapted\Domain\Model\Move.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Michael Blunck <mi.blunck@gmail.com>
 * @author Mirco Winkler <mirco.winkler@gmail.com>
 */
class MoveTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ChaptedTeam\Chapted\Domain\Model\Move
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ChaptedTeam\Chapted\Domain\Model\Move();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getMediaReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getMedia()
		);
	}

	/**
	 * @test
	 */
	public function setMediaForFileReferenceSetsMedia()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setMedia($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'media',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPointReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setPointForIntSetsPoint()
	{	}

	/**
	 * @test
	 */
	public function getFieldReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setFieldForIntSetsField()
	{	}

	/**
	 * @test
	 */
	public function getLikeMoveReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setLikeMoveForIntSetsLikeMove()
	{	}

	/**
	 * @test
	 */
	public function getPlayerReturnsInitialValueForPlayer()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPlayer()
		);
	}

	/**
	 * @test
	 */
	public function setPlayerForObjectStorageContainingPlayerSetsPlayer()
	{
		$player = new \ChaptedTeam\Chapted\Domain\Model\Player();
		$objectStorageHoldingExactlyOnePlayer = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePlayer->attach($player);
		$this->subject->setPlayer($objectStorageHoldingExactlyOnePlayer);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePlayer,
			'player',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPlayerToObjectStorageHoldingPlayer()
	{
		$player = new \ChaptedTeam\Chapted\Domain\Model\Player();
		$playerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$playerObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($player));
		$this->inject($this->subject, 'player', $playerObjectStorageMock);

		$this->subject->addPlayer($player);
	}

	/**
	 * @test
	 */
	public function removePlayerFromObjectStorageHoldingPlayer()
	{
		$player = new \ChaptedTeam\Chapted\Domain\Model\Player();
		$playerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$playerObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($player));
		$this->inject($this->subject, 'player', $playerObjectStorageMock);

		$this->subject->removePlayer($player);

	}
}
