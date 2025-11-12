<?php

use Clickpress\ContaoVereinsmanager\Controller\ContentElement\VereinsmanagerController;


$GLOBALS['TL_DCA']['tl_content']['palettes'][VereinsmanagerController::TYPE] =
    '{type_legend},type;{manager_legend},vereinsmanager_url,managerOffset,managerSmoothscroll;{template_legend:hide},customTpl;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['vereinsmanager_url'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'text',
    'eval' => [
        'rgxp' => 'httpurl',
        'placeholder' => 'https://meineabteilung.vereinsmanager.org',
        'mandatory' => true,
        'tl_class' => 'w50'
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['managerOffset'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'text',
    'default' => 20,
    'eval' => [
        'rgxp' => 'digit',
        'mandatory' => true,
        'tl_class' => 'w50'
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['managerSmoothscroll'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'checkbox',
    'default' => true,
    'eval' => [
        'tl_class' => 'cbx'
    ],
    'sql' => [
        'type' => 'boolean',
        'default' => false,
    ],
];
