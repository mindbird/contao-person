<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Person
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
	// Classes
	'Person\PersonList'        => 'system/modules/personen/classes/PersonList.php',

	// Models
	'Person\PersonModel'       => 'system/modules/personen/models/PersonModel.php',
	'Person\PersonArchivModel' => 'system/modules/personen/models/PersonArchivModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'person_list'          => 'system/modules/personen/templates',
	'mod_personlist'       => 'system/modules/personen/templates',
));
