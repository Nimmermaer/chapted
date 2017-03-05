<?php
namespace ChaptedTeam\Chapted\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Michael Blunck <mi.blunck@gmail.com>
 *  			Mirco Winkler <mirco.winkler@gmail.com>
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
 * Test case for class ChaptedTeam\Chapted\Controller\ChallengeController.
 *
 * @author Michael Blunck <mi.blunck@gmail.com>
 * @author Mirco Winkler <mirco.winkler@gmail.com>
 */
class ChallengeControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \ChaptedTeam\Chapted\Controller\ChallengeController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('ChaptedTeam\\Chapted\\Controller\\ChallengeController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllChallengesFromRepositoryAndAssignsThemToView()
	{

		$allChallenges = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$challengeRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\ChallengeRepository', array('findAll'), array(), '', FALSE);
		$challengeRepository->expects($this->once())->method('findAll')->will($this->returnValue($allChallenges));
		$this->inject($this->subject, 'challengeRepository', $challengeRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('challenges', $allChallenges);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenChallengeToView()
	{
		$challenge = new \ChaptedTeam\Chapted\Domain\Model\Challenge();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('challenge', $challenge);

		$this->subject->showAction($challenge);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenChallengeToChallengeRepository()
	{
		$challenge = new \ChaptedTeam\Chapted\Domain\Model\Challenge();

		$challengeRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\ChallengeRepository', array('add'), array(), '', FALSE);
		$challengeRepository->expects($this->once())->method('add')->with($challenge);
		$this->inject($this->subject, 'challengeRepository', $challengeRepository);

		$this->subject->createAction($challenge);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenChallengeToView()
	{
		$challenge = new \ChaptedTeam\Chapted\Domain\Model\Challenge();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('challenge', $challenge);

		$this->subject->editAction($challenge);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenChallengeInChallengeRepository()
	{
		$challenge = new \ChaptedTeam\Chapted\Domain\Model\Challenge();

		$challengeRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\ChallengeRepository', array('update'), array(), '', FALSE);
		$challengeRepository->expects($this->once())->method('update')->with($challenge);
		$this->inject($this->subject, 'challengeRepository', $challengeRepository);

		$this->subject->updateAction($challenge);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenChallengeFromChallengeRepository()
	{
		$challenge = new \ChaptedTeam\Chapted\Domain\Model\Challenge();

		$challengeRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\ChallengeRepository', array('remove'), array(), '', FALSE);
		$challengeRepository->expects($this->once())->method('remove')->with($challenge);
		$this->inject($this->subject, 'challengeRepository', $challengeRepository);

		$this->subject->deleteAction($challenge);
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenChallengeToView()
	{
		$challenge = new \ChaptedTeam\Chapted\Domain\Model\Challenge();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('challenge', $challenge);

		$this->subject->showAction($challenge);
	}
}
