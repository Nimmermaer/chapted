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
 * MoveController
 */
class MoveController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * moveRepository
     * 
     * @var \ChaptedTeam\Chapted\Domain\Repository\MoveRepository
     * @inject
     */
    protected $moveRepository = NULL;
    
    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $moves = $this->moveRepository->findAll();
        $this->view->assign('moves', $moves);
    }
    
    /**
     * action show
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Move $move
     * @return void
     */
    public function showAction(\ChaptedTeam\Chapted\Domain\Model\Move $move)
    {
        $this->view->assign('move', $move);
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
     * @param \ChaptedTeam\Chapted\Domain\Model\Move $newMove
     * @return void
     */
    public function createAction(\ChaptedTeam\Chapted\Domain\Model\Move $newMove)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->moveRepository->add($newMove);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Move $move
     * @ignorevalidation $move
     * @return void
     */
    public function editAction(\ChaptedTeam\Chapted\Domain\Model\Move $move)
    {
        $this->view->assign('move', $move);
    }
    
    /**
     * action update
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Move $move
     * @return void
     */
    public function updateAction(\ChaptedTeam\Chapted\Domain\Model\Move $move)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->moveRepository->update($move);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Move $move
     * @return void
     */
    public function deleteAction(\ChaptedTeam\Chapted\Domain\Model\Move $move)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->moveRepository->remove($move);
        $this->redirect('list');
    }
    
    /**
     * action like
     * 
     * @return void
     */
    public function likeAction()
    {
        
    }
    
    /**
     * action moreLikesmorePoints
     * 
     * @return void
     */
    public function moreLikesmorePointsAction()
    {
        
    }

}