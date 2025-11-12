<?php

namespace Clickpress\ContaoVereinsmanager\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Routing\ResponseContext\Csp\CspHandler;
use Contao\CoreBundle\Routing\ResponseContext\ResponseContextAccessor;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(category: 'miscellaneous')]
class VereinsmanagerController extends AbstractContentElementController
{
    public const string TYPE = 'vereinsmanager';

    public function __construct(
        readonly RequestStack $requestStack,
        readonly ScopeMatcher $scopeMatcher,
        readonly ResponseContextAccessor $responseContextAccessor
    ) {
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        if ($this->scopeMatcher->isBackendRequest($request)) {
            return new Response('<em>Einbettung des Wanderportals von vereinsmanager.org</em>');
        }

        $responseContext = $this->responseContextAccessor->getResponseContext();
        if ($responseContext?->has(CspHandler::class)) {
            /** @var CspHandler $cspHandler */
            if (!empty($responseContext)) {
                $cspHandler = $responseContext->get(CspHandler::class);
            }
            $cspHandler
                ->addSource('script-src', 'https://cdn.jsdelivr.net')
                ->addSource('frame-src', 'https://*.*.vereinsmanager.org')
                ->addSource('img-src', 'data:');
        }

        return $template->getResponse();
    }
}
