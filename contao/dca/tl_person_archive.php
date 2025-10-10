<?php

$GLOBALS['TL_DCA']['tl_person_archive'] = [

    // Config
    'config' => [
        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'switchToEdit' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary'
            ]
        ]
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
        'global_operations' => [
            'all' => [
                'label' => &$GLOBALS ['TL_LANG'] ['MSC'] ['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            ]
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person_archive'] ['edit'],
                'href' => 'table=tl_person',
                'icon' => 'edit.gif'
            ],
            'editheader' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person_archive'] ['editheader'],
                'href' => 'act=edit',
                'icon' => 'header.gif'
            ],
            'copy' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person_archive'] ['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif'
            ],
            'delete' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person_archive'] ['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS ['TL_LANG'] ['MSC'] ['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ],
            'show' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person_archive'] ['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
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
