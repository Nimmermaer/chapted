<?php
namespace ChaptedTeam\Chapted\Controller;

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
 * TableController
 */
class TableController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * tableRepository
     * 
     * @var \ChaptedTeam\Chapted\Domain\Repository\TableRepository
     * @inject
     */
    protected $tableRepository = NULL;
    
    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $tables = $this->tableRepository->findAll();
        $this->view->assign('tables', $tables);
    }
    
    /**
     * action show
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Table $table
     * @return void
     */
    public function showAction(\ChaptedTeam\Chapted\Domain\Model\Table $table)
    {
        $this->view->assign('table', $table);
    }
    
    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Table $newTable
     * @return void
     */
    public function createAction(\ChaptedTeam\Chapted\Domain\Model\Table $newTable)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->tableRepository->add($newTable);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Table $table
     * @ignorevalidation $table
     * @return void
     */
    public function editAction(\ChaptedTeam\Chapted\Domain\Model\Table $table)
    {
        $this->view->assign('table', $table);
    }
    
    /**
     * action update
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Table $table
     * @return void
     */
    public function updateAction(\ChaptedTeam\Chapted\Domain\Model\Table $table)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->tableRepository->update($table);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Table $table
     * @return void
     */
    public function deleteAction(\ChaptedTeam\Chapted\Domain\Model\Table $table)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->tableRepository->remove($table);
        $this->redirect('list');
    }
    
    /**
     * action filter
     * 
     * @return void
     */
    public function filterAction()
    {
        
    }

}