<?php

use Clickpress\ContaoVereinsmanager\Controller\ContentElement\VereinsmanagerController;


$GLOBALS['TL_DCA']['tl_content']['palettes'][VereinsmanagerController::TYPE] =
    '{type_legend},type,vereinsmanager_url;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['vereinsmanager_url'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'text',
    'eval' => [
        'rgxp' => 'httpurl',
        'placeholder'=>'https://meineabteilung.vereinsmanager.org',
        'mandatory'=>true,
        'tl_class' => 'w50 clr'
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];

