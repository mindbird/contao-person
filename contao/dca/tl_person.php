<?php

use Mindbird\Contao\Person\Table\Person;

$GLOBALS['TL_DCA']['tl_person'] = [

    // Config
    'config' => [
        'dataContainer' => \Contao\DC_Table::class,
        'ptable' => 'tl_person_archive',
        'switchToEdit' => true,
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
                'pid' => 'index'
            ]
        ]
    ],
    // List
    'list' => [
        'sorting' => [
            'mode' => 4,
            'fields' => [
                'sorting'
            ],
            'headerFields' => [
                'title'
            ],
            'child_record_callback' => [
                Person::class,
                'listPerson'
            ]
        ],
        'label' => [
            'fields' => [
                'lastname',
                'firstname'
            ],
            'format' => '%s, %s'
        ],
        'global_operations' => [
            'all' => [
                'label' => &$GLOBALS ['TL_LANG'] ['MSC'] ['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset();"'
            ]
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif'
            ],
            'copy' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif'
            ],
            'delete' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS ['TL_LANG'] ['MSC'] ['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ],
            'show' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ]
    ],
    // Palettes
    'palettes' => [
        'default' => '{name_legend},firstname, lastname, function; {address_legend}, street, street_number, postal_code, city; {contact_legend}, phone, email; {image_legend}, image;{description_legend}, description;'
    ],
    // Fields
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'pid' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'sorting' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'firstname' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'mandatory' => true,
                'tl_class' => 'w50',
                'maxlength' => 255
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'lastname' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'mandatory' => true,
                'tl_class' => 'w50',
                'maxlength' => 255
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'function' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50',
                'maxlength' => 255
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'street' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50',
                'maxlength' => 255
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'street_number' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50',
                'maxlength' => 255
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'postal_code' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50',
                'maxlength' => 5,
                'rgxp' => 'digit'
            ],
            'sql' => "varchar(5) NOT NULL default ''"
        ],
        'city' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50',
                'maxlength' => 255
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'phone' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50',
                'maxlength' => 255,
                'rgxp' => 'phone'
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'email' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50',
                'maxlength' => 255,
                'rgxp' => 'email'
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'image' => [
            'exclude' => true,
            'search' => false,
            'inputType' => 'fileTree',
            'eval' => [
                'filesOnly' => true,
                'fieldType' => 'radio',
                'tl_class' => 'clr',
                'extensions' => 'jpg, jpeg, png, gif'
            ],
            'sql' => "binary(16) NULL"
        ],
        'description' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'textarea',
            'eval' => [
                'rte' => 'tinyMCE',
                'helpwizard' => true
            ],
            'explanation' => 'insertTags',
            'sql' => "mediumtext NULL"
        ]
    ]
];


