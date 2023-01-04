<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Controller;

use ChaptedTeam\Chapted\Domain\Model\Challenge;
use ChaptedTeam\Chapted\Domain\Repository\ChallengeRepository;
use ChaptedTeam\Chapted\Domain\Repository\PlayerRepository;
use ChaptedTeam\Chapted\Utilities\Base64FileExtractor;
use chillerlan\QRCode\QRCode;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\StringUtility;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

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
 * ChallengeController
 */
class ChallengeController extends ActionController
{
    public function __construct(
        private readonly ChallengeRepository $challengeRepository,
        private readonly PersistenceManager $persistenceManager
    ) {
    }

    /**
     * action list
     */
    public function listAction(): ResponseInterface
    {
        $challenges = $this->challengeRepository->findAll();
        $this->view->assign('challenges', $challenges);
        return $this->htmlResponse();
    }

    /**
     * action show
     */
    public function showAction(Challenge $challenge): ResponseInterface
    {
        $this->view->assign('challenge', $challenge);
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

    #[Extbase\IgnoreValidation([
        'argumentName' => 'newChallenge',
    ])]
    public function createAction(Challenge $newChallenge): ResponseInterface
    {
        $dataHandler = GeneralUtility::makeInstance(DataHandler::class);

        $this->challengeRepository->add($newChallenge);
        $this->persistenceManager->persistAll();
        $file = self::createQRCode($newChallenge);
        $newId = StringUtility::getUniqueId('NEW');

        // @todo configure Pid
        $data = [
            'sys_file_reference' => [
                $newId => [
                    'table_local' => 'sys_file',
                    'uid_local' => $file->getUid(),
                    'tablenames' => 'tx_chapted_domain_model_challenge',
                    'uid_foreign' => $newChallenge->getUid(),
                    'fieldname' => 'qr_code',
                    'pid' => 5,
                ],
            ],
            'tx_chapted_domain_model_challenge' => [
                $newChallenge->getUid() => [
                    'qr_code' => $newId,
                ],
            ],
            'fe_users' => [
                (string) $newChallenge->getOwner()->getUid() => [
                    'challenges' => (string) $newChallenge->getUid(),
                    'owner' => (string) $newChallenge->getOwner()->getUid(),
                ],
            ],
        ];

        $dataHandler->start($data, []);
        $dataHandler->process_datamap();

        return $this->redirect('show', 'Player', 'chapted', [
            'player' => $newChallenge->getOwner(),
        ]);
    }

    /**
     * action edit
     *
     * @Extbase\IgnoreValidation("challenge")
     */
    public function editAction(Challenge $challenge): ResponseInterface
    {
        $this->view->assign('challenge', $challenge);
        return $this->htmlResponse();
    }

    /**
     * action update
     */
    public function updateAction(Challenge $challenge): void
    {
        $this->addFlashMessage(
            'The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain',
            '',
            AbstractMessage::ERROR
        );
        $this->challengeRepository->update($challenge);
        $this->redirect('list');
    }

    /**
     * action delete
     */
    public function deleteAction(Challenge $challenge): void
    {
        $this->addFlashMessage(
            'The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain',
            '',
            AbstractMessage::ERROR
        );
        $this->challengeRepository->remove($challenge);
        $this->redirect('list');
    }

    /**
     * action sortingWithLike
     */
    public function sortingWithLikeAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action showMoves
     */
    public function showMovesAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action filter
     */
    public function filterAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    private function createQRCode(Challenge $challenge): File
    {
        // @todo target pid muss konfigurierbar sein. Welche Stelle ?
        $uriBuilder = $this->uriBuilder;
        $uri = $uriBuilder->reset()
            ->setArguments(
                [
                    'challenge' => $challenge->getUid(),
                ]
            )->setTargetPageUid(3)
            ->setCreateAbsoluteUri(true)
            ->build();
        return Base64FileExtractor::getFileFromBase64Decode(
            (new QRCode())->render($uri),
            $challenge->getDescription()
        );
    }
}
