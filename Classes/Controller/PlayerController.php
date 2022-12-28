<?php

namespace ChaptedTeam\Chapted\Controller;

use ChaptedTeam\Chapted\Domain\Model\Player;
use ChaptedTeam\Chapted\Domain\Repository\PlayerRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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
class PlayerController extends ActionController
{
    /**
     * playerRepository
     *
     * @var PlayerRepository
     */
    protected $playerRepository;

    /**
     * action list
     */
    public function listAction(): ResponseInterface
    {
        $players = $this->playerRepository->findAll();
        $this->view->assign('players', $players);
        return $this->htmlResponse();
    }

    /**
     * action show
     */
    public function showAction(Player $player): ResponseInterface
    {
        $this->view->assign('player', $player);
        return $this->htmlResponse();
    }

    /**
     * action new
     */
    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     */
    public function createAction(Player $newPlayer): void
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', AbstractMessage::ERROR);
        $this->playerRepository->add($newPlayer);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @Extbase\IgnoreValidation("player")
     */
    public function editAction(Player $player): ResponseInterface
    {
        $this->view->assign('player', $player);
        return $this->htmlResponse();
    }

    /**
     * action update
     */
    public function updateAction(Player $player): void
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', AbstractMessage::ERROR);
        $this->playerRepository->update($player);
        $this->redirect('list');
    }

    /**
     * action delete
     */
    public function deleteAction(Player $player): void
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', AbstractMessage::ERROR);
        $this->playerRepository->remove($player);
        $this->redirect('list');
    }

    /**
     * action login
     */
    public function loginAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action maximumChallenges
     */
    public function maximumChallengesAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action sendNotificationMail
     */
    public function sendNotificationMailAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action sendInviteMail
     */
    public function sendInviteMailAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function injectPlayerRepository(PlayerRepository $playerRepository): void
    {
        $this->playerRepository = $playerRepository;
    }
}
