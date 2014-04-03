<?php
$GLOBALS['TL_DCA']['tl_content']['palettes']['person'] = '{type_legend},type,headline;{person_legend},personID,size;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS ['TL_DCA'] ['tl_content'] ['fields'] ['personID'] = array (
		'label' => &$GLOBALS ['TL_LANG'] ['tl_content'] ['personID'],
		'default' => '',
		'exclude' => true,
		'inputType' => 'select',
		'foreignKey' => 'tl_person.CONCAT(firstname, " ", lastname)',
		'eval' => array (
				'mandatory' => true,
		),
		'sql' => "int(10) unsigned NOT NULL default '0'"
);

?>