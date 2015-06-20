<?php

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
