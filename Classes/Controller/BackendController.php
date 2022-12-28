<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Controller;

use ChaptedTeam\Chapted\Domain\Repository\ChallengeRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class BackendController extends ActionController
{
    public function __construct(
        protected readonly ChallengeRepository $challengeRepository,
        protected readonly ModuleTemplateFactory $moduleTemplateFactory,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $this->view->assign('challenges', $this->challengeRepository->findAll());
        $moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        // Adding title, menus, buttons, etc. using $moduleTemplate ...
        $moduleTemplate->setContent($this->view->render());
        return $this->htmlResponse($moduleTemplate->renderContent());
    }
}
