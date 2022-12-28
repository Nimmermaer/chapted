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
 * Test case for class \ChaptedTeam\Chapted\Domain\Model\Challenge.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Michael Blunck <mi.blunck@gmail.com>
 * @author Mirco Winkler <mirco.winkler@gmail.com>
 */
class ChallengeTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \ChaptedTeam\Chapted\Domain\Model\Challenge
     */
    protected $subject = null;

    public function setUp()
    {
        $this->subject = new \ChaptedTeam\Chapted\Domain\Model\Challenge();
    }

    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
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
    public function getReckoningReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getReckoning()
        );
    }

    /**
     * @test
     */
    public function setReckoningForStringSetsReckoning()
    {
        $this->subject->setReckoning('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'reckoning',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLikesReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setLikesForIntSetsLikes()
    {
    }

    /**
     * @test
     */
    public function getWinningPointReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getWinningPoint()
        );
    }

    /**
     * @test
     */
    public function setWinningPointForStringSetsWinningPoint()
    {
        $this->subject->setWinningPoint('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'winningPoint',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getQrCodeReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getQrCode()
        );
    }

    /**
     * @test
     */
    public function setQrCodeForStringSetsQrCode()
    {
        $this->subject->setQrCode('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'qrCode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLatitudeReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getLatitude()
        );
    }

    /**
     * @test
     */
    public function setLatitudeForStringSetsLatitude()
    {
        $this->subject->setLatitude('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'latitude',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLongitudeReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getLongitude()
        );
    }

    /**
     * @test
     */
    public function setLongitudeForStringSetsLongitude()
    {
        $this->subject->setLongitude('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'longitude',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMovesReturnsInitialValueForMove()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->assertEquals(
            $newObjectStorage,
            $this->subject->getMoves()
        );
    }

    /**
     * @test
     */
    public function setMovesForObjectStorageContainingMoveSetsMoves()
    {
        $move = new \ChaptedTeam\Chapted\Domain\Model\Move();
        $objectStorageHoldingExactlyOneMoves = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneMoves->attach($move);
        $this->subject->setMoves($objectStorageHoldingExactlyOneMoves);

        $this->assertAttributeEquals(
            $objectStorageHoldingExactlyOneMoves,
            'moves',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addMoveToObjectStorageHoldingMoves()
    {
        $move = new \ChaptedTeam\Chapted\Domain\Model\Move();
        $movesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', ['attach'], [], '', false);
        $movesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($move));
        $this->inject($this->subject, 'moves', $movesObjectStorageMock);

        $this->subject->addMove($move);
    }

    /**
     * @test
     */
    public function removeMoveFromObjectStorageHoldingMoves()
    {
        $move = new \ChaptedTeam\Chapted\Domain\Model\Move();
        $movesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', ['detach'], [], '', false);
        $movesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($move));
        $this->inject($this->subject, 'moves', $movesObjectStorageMock);

        $this->subject->removeMove($move);
    }

    /**
     * @test
     */
    public function getOwnerReturnsInitialValueForPlayer()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->assertEquals(
            $newObjectStorage,
            $this->subject->getOwner()
        );
    }

    /**
     * @test
     */
    public function setOwnerForObjectStorageContainingPlayerSetsOwner()
    {
        $owner = new \ChaptedTeam\Chapted\Domain\Model\Player();
        $objectStorageHoldingExactlyOneOwner = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneOwner->attach($owner);
        $this->subject->setOwner($objectStorageHoldingExactlyOneOwner);

        $this->assertAttributeEquals(
            $objectStorageHoldingExactlyOneOwner,
            'owner',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addOwnerToObjectStorageHoldingOwner()
    {
        $owner = new \ChaptedTeam\Chapted\Domain\Model\Player();
        $ownerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', ['attach'], [], '', false);
        $ownerObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($owner));
        $this->inject($this->subject, 'owner', $ownerObjectStorageMock);

        $this->subject->addOwner($owner);
    }

    /**
     * @test
     */
    public function removeOwnerFromObjectStorageHoldingOwner()
    {
        $owner = new \ChaptedTeam\Chapted\Domain\Model\Player();
        $ownerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', ['detach'], [], '', false);
        $ownerObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($owner));
        $this->inject($this->subject, 'owner', $ownerObjectStorageMock);

        $this->subject->removeOwner($owner);
    }
}
