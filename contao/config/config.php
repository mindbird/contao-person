<?php

/**
 * BACK END MODULES
 */
$GLOBALS ['BE_MOD'] ['content'] ['person'] = array(
    'tables' => array(
        'tl_person_archive',
        'tl_person'
    ),
    'icon' => 'system/modules/person/assets/images/icon.png'
);

/**
 * FRONT END MODULES
 */
array_insert($GLOBALS ['FE_MOD'] ['people'], 1, array(
    'person_list' => 'Person\ModulePersonList'
));


/**
 * CONTENT ELEMENTS
 */
$GLOBALS['TL_CTE']['includes']['person'] = 'Person\PersonContentElement';
