<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['person'] = '{type_legend},type,headline;{person_legend},personID,size;{template_legend},personTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS ['TL_DCA'] ['tl_content'] ['fields'] ['personID'] = array(
    'label' => &$GLOBALS ['TL_LANG'] ['tl_content'] ['personID'],
    'default' => '',
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('\Mindbird\Contao\Person\Table\Content', 'getPersonList'),
    'eval' => array(
        'mandatory' => true,
        'chosen' => true
    ),
    'sql' => "varchar(10) NOT NULL default ''"
);

$GLOBALS ['TL_DCA'] ['tl_content'] ['fields']['personTpl'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['personTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('\Mindbird\Contao\Person\Table\Content', 'getPersonTemplates'),
    'eval' => array(
        'includeBlankOption' => true,
        'chosen' => true,
        'tl_class' => 'w50'
    ),
    'sql' => "varchar(64) NOT NULL default ''"
);
