<?php

use Mindbird\Contao\Person\Controller\ContentElement\PersonContentElement;
use Mindbird\Contao\Person\Controller\ContentElement\PersonListContentElement;

$GLOBALS['TL_LANG']['MOD']['person'] = ['Personen', 'Verwaltung von Personen und Archiven.'];

$GLOBALS['TL_LANG']['CTE'][PersonContentElement::TYPE] = ['Person', 'Bindet eine einzelne Person ein.'];
$GLOBALS['TL_LANG']['CTE'][PersonListContentElement::TYPE] = ['Personen Liste', 'Bindet ein Archiv als Liste von Personen ein.'];
