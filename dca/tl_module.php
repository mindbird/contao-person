<?php
$GLOBALS ['TL_DCA'] ['tl_module'] ['palettes'] ['person_list'] = '{title_legend},name,headline,type;{archiv_legend},person_archiv;{protected_legend:hide},protected;
{expert_legend:hide},guests,cssID,space';

$GLOBALS ['TL_DCA'] ['tl_module'] ['fields'] ['person_archiv'] = array (
		'label' => &$GLOBALS ['TL_LANG'] ['tl_module'] ['person_archiv'],
		'default' => '',
		'exclude' => true,
		'inputType' => 'select',
		'foreignKey' => 'tl_person_archive.title',
		
		'eval' => array (
				'mandatory' => true,
				'tl_class' => 'w50' 
		),
		'sql' => "int(10) unsigned NOT NULL default '0'" 
);

?>