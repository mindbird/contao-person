<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Personen
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
    'Person',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    // Models
    'Contao\PersonModel' => 'system/modules/person/models/PersonModel.php',
    'Contao\PersonArchivModel' => 'system/modules/person/models/PersonArchivModel.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'ce_person' => 'system/modules/person/templates',
    'mod_personlist' => 'system/modules/person/templates',
    'person_list' => 'system/modules/person/templates',
));
