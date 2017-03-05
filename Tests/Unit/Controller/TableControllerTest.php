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
 * Test case for class ChaptedTeam\Chapted\Controller\TableController.
 *
 * @author Michael Blunck <mi.blunck@gmail.com>
 * @author Mirco Winkler <mirco.winkler@gmail.com>
 */
class TableControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \ChaptedTeam\Chapted\Controller\TableController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('ChaptedTeam\\Chapted\\Controller\\TableController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTablesFromRepositoryAndAssignsThemToView()
	{

		$allTables = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$tableRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\TableRepository', array('findAll'), array(), '', FALSE);
		$tableRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTables));
		$this->inject($this->subject, 'tableRepository', $tableRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('tables', $allTables);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTableToView()
	{
		$table = new \ChaptedTeam\Chapted\Domain\Model\Table();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('table', $table);

		$this->subject->showAction($table);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTableToTableRepository()
	{
		$table = new \ChaptedTeam\Chapted\Domain\Model\Table();

		$tableRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\TableRepository', array('add'), array(), '', FALSE);
		$tableRepository->expects($this->once())->method('add')->with($table);
		$this->inject($this->subject, 'tableRepository', $tableRepository);

		$this->subject->createAction($table);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTableToView()
	{
		$table = new \ChaptedTeam\Chapted\Domain\Model\Table();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('table', $table);

		$this->subject->editAction($table);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTableInTableRepository()
	{
		$table = new \ChaptedTeam\Chapted\Domain\Model\Table();

		$tableRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\TableRepository', array('update'), array(), '', FALSE);
		$tableRepository->expects($this->once())->method('update')->with($table);
		$this->inject($this->subject, 'tableRepository', $tableRepository);

		$this->subject->updateAction($table);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTableFromTableRepository()
	{
		$table = new \ChaptedTeam\Chapted\Domain\Model\Table();

		$tableRepository = $this->getMock('ChaptedTeam\\Chapted\\Domain\\Repository\\TableRepository', array('remove'), array(), '', FALSE);
		$tableRepository->expects($this->once())->method('remove')->with($table);
		$this->inject($this->subject, 'tableRepository', $tableRepository);

		$this->subject->deleteAction($table);
	}
}
