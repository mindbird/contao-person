<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   Person
 * @author    mindbird
 * @license   GNU/LGPL
 * @copyright mindbird 2013
 */

/**
 * Table person_archiv
 */
$GLOBALS ['TL_DCA'] ['tl_person_archive'] = array(

    // Config
    'config' => array(
        'dataContainer' => 'Table',
        //'ctable' => array (
        //	'tl_person_entry'
        //),
        'enableVersioning' => true,
        'switchToEdit' => true,
        'sql' => array(
            'keys' => array(
                'id' => 'primary'
            )
        )
    ),
    // List
    'list' => array(
        'sorting' => array(
            'mode' => 1,
            'fields' => array(
                'title'
            ),
            'flag' => 1,
            'panelLayout' => 'filter;search,limit'
        ),
        'label' => array(
            'fields' => array(
                'title'
            ),
            'format' => '%s'
        ),
        'global_operations' => array(
            'all' => array(
                'label' => &$GLOBALS ['TL_LANG'] ['MSC'] ['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array(
            'edit' => array(
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person_archive'] ['edit'],
                'href' => 'table=tl_person',
                'icon' => 'edit.gif'
            ),
            'editheader' => array(
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person_archive'] ['editheader'],
                'href' => 'act=edit',
                'icon' => 'header.gif'
            ),
            'copy' => array(
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person_archive'] ['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif'
            ),
            'delete' => array(
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person_archive'] ['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS ['TL_LANG'] ['MSC'] ['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show' => array(
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person_archive'] ['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            )
        )
    ),
    // Palettes
    'palettes' => array(
        'default' => '{title_legend},title'
    ),
    // Fields
    'fields' => array(
        'id' => array(
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array(
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'title' => array(
            'label' => &$GLOBALS ['TL_LANG'] ['tl_person_archive'] ['title'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array(
                'mandatory' => true,
                'maxlength' => 255
            ),
            'sql' => "varchar(255) NOT NULL default ''"
        )
    )
);

?>