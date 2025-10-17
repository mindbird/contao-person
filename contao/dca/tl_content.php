<?php

$GLOBALS['TL_DCA']['tl_content']['palettes'][\Mindbird\Contao\Person\Controller\ContentElement\PersonContentElement::TYPE] = '{type_legend},type,headline;{person_legend},personID,size;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes'][\Mindbird\Contao\Person\Controller\ContentElement\PersonListContentElement::TYPE] = '{type_legend},type,headline;{person_legend},person_archiv,size;{invisible_legend:hide},invisible,start,stop';

$GLOBALS ['TL_DCA'] ['tl_content'] ['fields'] ['personID'] = [
    'default' => '',
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => [\Mindbird\Contao\Person\Table\Content::class, 'getPersonList'],
    'eval' => [
        'mandatory' => true,
        'chosen' => true
    ],
    'sql' => "varchar(10) NOT NULL default ''"
];

$GLOBALS ['TL_DCA'] ['tl_content'] ['fields'] ['person_archiv'] = [
    'exclude' => true,
    'inputType' => 'select',
    'foreignKey' => 'tl_person_archive.title',
    'eval' => [
        'mandatory' => true,
        'tl_class' => 'w50'
    ],
    'sql' => "int(10) unsigned NOT NULL default '0'"
];
