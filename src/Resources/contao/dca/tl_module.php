<?php

$GLOBALS ['TL_DCA'] ['tl_module'] ['onload_callback'][]  = array(
    'tl_module_person', 'onLoadCallback'
);

$GLOBALS ['TL_DCA'] ['tl_module'] ['palettes'] ['person_list'] = '{title_legend},name,headline,type;{archiv_legend},person_archiv,imgSize;{template_legend},customTpl,personTpl;{protected_legend:hide},protected;
{expert_legend:hide},guests,cssID,space';

$GLOBALS ['TL_DCA'] ['tl_module'] ['fields'] ['person_archiv'] = array(
    'label' => &$GLOBALS ['TL_LANG'] ['tl_module'] ['person_archiv'],
    'exclude' => true,
    'inputType' => 'select',
    'foreignKey' => 'tl_person_archive.title',
    'eval' => array(
        'mandatory' => true,
        'tl_class' => 'w50'
    ),
    'sql' => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS ['TL_DCA'] ['tl_module'] ['fields']['personTpl'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['personTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_module_person', 'getPersonTemplates'),
    'eval' => array('includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);

class tl_module_person extends Backend
{
    public function getPersonTemplates()
    {
        return $this->getTemplateGroup('person_');
    }

    public function getModuleTemplates()
    {
        return $this->getTemplateGroup('mod_personlist');
    }

    public function onLoadCallback(\Contao\DataContainer $dc)
    {
        if ($dc->type !== 'person_list') {
            return;
        }

        $GLOBALS ['TL_DCA'] ['tl_module'] ['fields']['customTpl']['options_callback'] = array
        (
            'tl_module_person', 'getModuleTemplates'
        );
    }
}
