<?php

namespace Clickpress\ContaoVereinsmanager\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(category: 'texts', template: 'ce_vereinsmanager', name: 'vereinsmanager')]
class VereinsmanagerController extends AbstractContentElementController
{
    public const TYPE = 'vereinsmanager';

    public function __construct(
        readonly RequestStack $requestStack,
        readonly ScopeMatcher $scopeMatcher,
    ) {
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        if ($this->scopeMatcher->isBackendRequest($request)) {
            return new Response('<em>Einbettung des Wanderportals von vereinsmanager.org</em>');
        }

        return $template->getResponse();
    }
}
