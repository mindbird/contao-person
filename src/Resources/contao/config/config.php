<?php

/**
 * BACK END MODULES
 */
$GLOBALS ['BE_MOD'] ['content'] ['person'] = array(
    'tables' => array(
        'tl_person_archive',
        'tl_person'
    )
);

/**
 * FRONT END MODULES
 */
$GLOBALS ['FE_MOD'] ['people'] = [
    'person_list' => '\Mindbird\Contao\Person\Module\PersonList'
];

/**
 * CONTENT ELEMENTS
 */
$GLOBALS['TL_CTE']['includes']['person'] = '\Mindbird\Contao\Person\Content\Person';

/**
 * MODELS
 */
$GLOBALS['TL_MODELS']['tl_person'] = '\Mindbird\Contao\Person\Model\Person';
$GLOBALS['TL_MODELS']['tl_person_archive'] = '\Mindbird\Contao\Person\Model\PersonArchive';
