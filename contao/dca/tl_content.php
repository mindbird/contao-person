<?php
$GLOBALS['TL_DCA']['tl_content']['palettes']['person'] = '{type_legend},type,headline;{person_legend},personID,size;{template_legend},personTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS ['TL_DCA'] ['tl_content'] ['fields'] ['personID'] = array(
    'label' => &$GLOBALS ['TL_LANG'] ['tl_content'] ['personID'],
    'default' => '',
    'exclude' => true,
    'inputType' => 'select',
    'foreignKey' => 'tl_person.CONCAT(firstname, " ", lastname)',
    'eval' => array(
        'mandatory' => true,
    ),
    'sql' => "varchar(10) NOT NULL default ''"
);

$GLOBALS ['TL_DCA'] ['tl_content'] ['fields']['personTpl'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['personTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_content_person', 'getPersonTemplates'),
    'eval' => array('includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);

class tl_content_person extends Backend
{
    public function getPersonTemplates()
    {
        return $this->getTemplateGroup('ce_person');
    }
}
