<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Controller;

use ChaptedTeam\Chapted\Domain\Model\Table;
use ChaptedTeam\Chapted\Domain\Repository\TableRepository;
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
 * TableController
 */
class TableController extends ActionController
{
    public function __construct(
        private readonly TableRepository $tableRepository
    ) {
    }

    /**
     * action list
     */
    public function listAction(): ResponseInterface
    {
        $tables = $this->tableRepository->findAll();
        $this->view->assign('tables', $tables);
        return $this->htmlResponse();
    }

    /**
     * action show
     */
    public function showAction(Table $table): ResponseInterface
    {
        $this->view->assign('table', $table);
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
    public function createAction(Table $newTable): void
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', AbstractMessage::ERROR);
        $this->tableRepository->add($newTable);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @Extbase\IgnoreValidation("table")
     */
    public function editAction(Table $table): ResponseInterface
    {
        $this->view->assign('table', $table);
        return $this->htmlResponse();
    }

    /**
     * action update
     */
    public function updateAction(Table $table): void
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', AbstractMessage::ERROR);
        $this->tableRepository->update($table);
        $this->redirect('list');
    }

    /**
     * action delete
     */
    public function deleteAction(Table $table): void
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', AbstractMessage::ERROR);
        $this->tableRepository->remove($table);
        $this->redirect('list');
    }

    /**
     * action filter
     */
    public function filterAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }
}
