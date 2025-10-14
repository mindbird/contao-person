<?php

$GLOBALS['TL_DCA']['tl_person_archive'] = [

    // Config
    'config' => [
        'dataContainer' => \Contao\DC_Table::class,
        'enableVersioning' => true,
        'switchToEdit' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary'
            ]
        ],
        'ctable' => ['tl_person']
    ],
    // List
    'list' => [
        'sorting' => [
            'mode' => 1,
            'fields' => [
                'title'
            ],
            'flag' => 1,
            'panelLayout' => 'filter;search,limit'
        ],
        'label' => [
            'fields' => [
                'title'
            ],
            'format' => '%s'
        ],
        'operations' => [
            '!edit',
            '!children',
            'copy',
            'cut',
            'delete'
        ]
    ],
    // Palettes
    'palettes' => [
        'default' => '{title_legend},title'
    ],
    // Fields
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'title' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'mandatory' => true,
                'maxlength' => 255
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ]
    ]
];
