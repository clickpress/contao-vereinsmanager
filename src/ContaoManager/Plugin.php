<?php

declare(strict_types=1);


namespace Clickpress\ContaoVereinsmanager\ContaoManager;

use Clickpress\ContaoVereinsmanager\ContaoVereinsmanagerBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoVereinsmanagerBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
