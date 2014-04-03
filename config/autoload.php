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
	'Person\PersonModel'       => 'system/modules/Personen/models/PersonModel.php',
	'Person\PersonArchivModel' => 'system/modules/Personen/models/PersonArchivModel.php',

	// Classes
	'Person\PersonList'        => 'system/modules/Personen/classes/PersonList.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_personlist' => 'system/modules/Personen/templates',
	'person_list'    => 'system/modules/Personen/templates',
));
