<?php

use Mindbird\Contao\Person\Model\Person;
use Mindbird\Contao\Person\Model\PersonArchive;

$GLOBALS ['BE_MOD'] ['content'] ['person'] = [
    'tables' => [
        'tl_person_archive',
        'tl_person'
    ]
];

/**
 * MODELS
 */
$GLOBALS['TL_MODELS']['tl_person'] = Person::class;
$GLOBALS['TL_MODELS']['tl_person_archive'] = PersonArchive::class;
