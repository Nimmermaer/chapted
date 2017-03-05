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
 * PlayerController
 */
class PlayerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * playerRepository
     * 
     * @var \ChaptedTeam\Chapted\Domain\Repository\PlayerRepository
     * @inject
     */
    protected $playerRepository = NULL;
    
    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $players = $this->playerRepository->findAll();
        $this->view->assign('players', $players);
    }
    
    /**
     * action show
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Player $player
     * @return void
     */
    public function showAction(\ChaptedTeam\Chapted\Domain\Model\Player $player)
    {
        $this->view->assign('player', $player);
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
     * @param \ChaptedTeam\Chapted\Domain\Model\Player $newPlayer
     * @return void
     */
    public function createAction(\ChaptedTeam\Chapted\Domain\Model\Player $newPlayer)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->playerRepository->add($newPlayer);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Player $player
     * @ignorevalidation $player
     * @return void
     */
    public function editAction(\ChaptedTeam\Chapted\Domain\Model\Player $player)
    {
        $this->view->assign('player', $player);
    }
    
    /**
     * action update
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Player $player
     * @return void
     */
    public function updateAction(\ChaptedTeam\Chapted\Domain\Model\Player $player)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->playerRepository->update($player);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \ChaptedTeam\Chapted\Domain\Model\Player $player
     * @return void
     */
    public function deleteAction(\ChaptedTeam\Chapted\Domain\Model\Player $player)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->playerRepository->remove($player);
        $this->redirect('list');
    }
    
    /**
     * action login
     * 
     * @return void
     */
    public function loginAction()
    {
        
    }
    
    /**
     * action maximumChallenges
     * 
     * @return void
     */
    public function maximumChallengesAction()
    {
        
    }
    
    /**
     * action sendNotificationMail
     * 
     * @return void
     */
    public function sendNotificationMailAction()
    {
        
    }
    
    /**
     * action sendInviteMail
     * 
     * @return void
     */
    public function sendInviteMailAction()
    {
        
    }

}