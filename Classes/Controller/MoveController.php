<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Controller;

use ChaptedTeam\Chapted\Domain\Model\Move;
use ChaptedTeam\Chapted\Domain\Model\Player;
use ChaptedTeam\Chapted\Domain\Repository\MoveRepository;
use ChaptedTeam\Chapted\Domain\Repository\PlayerRepository;
use ChaptedTeam\Chapted\Utilities\Base64FileExtractor;
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
 * MoveController
 */
class MoveController extends ActionController
{
    public function __construct(
        private readonly MoveRepository $moveRepository,
        private readonly PlayerRepository $playerRepository
    ) {
    }

    /**
     * action list
     */
    public function listAction(): ResponseInterface
    {
        $moves = $this->moveRepository->findAll();
        $this->view->assign('moves', $moves);
        return $this->htmlResponse();
    }

    /**
     * action show
     */
    public function showAction(Move $move): ResponseInterface
    {
        $this->view->assign('move', $move);
        return $this->htmlResponse();
    }

    /**
     * action new
     */
    public function newAction(): ResponseInterface
    {
        $this->view->assign('player', $this->request->getArgument('player'));
        return $this->htmlResponse();
    }

    /**
     * action create
     */
    public function createAction(Move $newMove): ResponseInterface
    {
        try {
            $fileReference = (new Base64FileExtractor())::getFileReferenceFromBase64(
                ($this->request->getArguments()['image'] ?? ''),
                $newMove
            );
            $newMove->setMedia($fileReference);
        } catch (\Exception) {
            // something goes wrong with the image
        }
        $this->moveRepository->add($newMove);
        return $this->redirect('show', 'Player' );
    }

    /**
     * action edit
     *
     * @Extbase\IgnoreValidation("move")
     */
    public function editAction(Move $move): ResponseInterface
    {
        $this->view->assign('move', $move);
        return $this->htmlResponse();
    }

    /**
     * action update
     */
    public function updateAction(Move $move): void
    {
        $this->addFlashMessage(
            'The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain',
            '',
            AbstractMessage::ERROR
        );
        $this->moveRepository->update($move);
        $this->redirect('list');
    }

    /**
     * action delete
     */
    public function deleteAction(Move $move): void
    {
        $this->addFlashMessage(
            'The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain',
            '',
            AbstractMessage::ERROR
        );
        $this->moveRepository->remove($move);
        $this->redirect('list');
    }

    /**
     * action like
     */
    public function likeAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action moreLikesmorePoints
     */
    public function moreLikesmorePointsAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }
}
