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
 * Test case for class ChaptedTeam\Chapted\Controller\MoveController.
 *
 * @author Michael Blunck <mi.blunck@gmail.com>
 * @author Mirco Winkler <mirco.winkler@gmail.com>
 */
class MoveControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \ChaptedTeam\Chapted\Controller\MoveController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('ChaptedTeam\\Chapted\\Controller\\MoveController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllmovesFromRepositoryAndAssignsThemToView()
	{

		$allmoves = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$moveRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\MoveRepository', array('findAll'), array(), '', FALSE);
		$moveRepository->expects($this->once())->method('findAll')->will($this->returnValue($allmoves));
		$this->inject($this->subject, 'moveRepository', $moveRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('moves', $allmoves);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenMoveToView()
	{
		$move = new \ChaptedTeam\Chapted\Domain\Model\Move();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('move', $move);

		$this->subject->showAction($move);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenMoveToMoveRepository()
	{
		$move = new \ChaptedTeam\Chapted\Domain\Model\Move();

		$moveRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\MoveRepository', array('add'), array(), '', FALSE);
		$moveRepository->expects($this->once())->method('add')->with($move);
		$this->inject($this->subject, 'moveRepository', $moveRepository);

		$this->subject->createAction($move);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenMoveToView()
	{
		$move = new \ChaptedTeam\Chapted\Domain\Model\Move();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('move', $move);

		$this->subject->editAction($move);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenMoveInMoveRepository()
	{
		$move = new \ChaptedTeam\Chapted\Domain\Model\Move();

		$moveRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\MoveRepository', array('update'), array(), '', FALSE);
		$moveRepository->expects($this->once())->method('update')->with($move);
		$this->inject($this->subject, 'moveRepository', $moveRepository);

		$this->subject->updateAction($move);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenMoveFromMoveRepository()
	{
		$move = new \ChaptedTeam\Chapted\Domain\Model\Move();

		$moveRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\MoveRepository', array('remove'), array(), '', FALSE);
		$moveRepository->expects($this->once())->method('remove')->with($move);
		$this->inject($this->subject, 'moveRepository', $moveRepository);

		$this->subject->deleteAction($move);
	}
}
