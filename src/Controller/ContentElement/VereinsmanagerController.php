<?php

namespace Clickpress\Vereinsmanager\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(category: 'texts')]
class VereinsmanagerController extends AbstractContentElementController
{
    public function __construct(
        readonly RequestStack $requestStack,
        readonly ScopeMatcher $scopeMatcher,
    ) {
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        if ($this->scopeMatcher->isBackendRequest()) {
            return new Response('<em>Einbettung des Wanderportals von vereinsmanager.org</em>');
        }

        return $template->getResponse();
    }
}
