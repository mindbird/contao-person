<?php

/**
 * Table person_entry
 */
$GLOBALS ['TL_DCA'] ['tl_person'] = array(

    // Config
    'config' => array(
        'dataContainer' => 'Table',
        'ptable' => 'tl_person_archive',
        'switchToEdit' => true,
        'enableVersioning' => true,
        'sql' => array(
            'keys' => array(
                'id' => 'primary',
                'pid' => 'index'
            )
        )
    ),
    // List
    'list' => array(
        'sorting' => array(
            'mode' => 4,
            'fields' => array(
                'sorting'
            ),
            'headerFields' => array(
                'title'
            ),
            'child_record_callback' => array(
                '\Mindbird\Contao\Person\Table\Person',
                'listPerson'
            )
        ),
        'label' => array(
            'fields' => array(
                'lastname',
                'firstname'
            ),
            'format' => '%s, %s'
        ),
        'global_operations' => array(
            'all' => array(
                'label' => &$GLOBALS ['TL_LANG'] ['MSC'] ['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset();"'
            )
        ),
        'operations' => array(
            'edit' => array(
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif'
            ),
            'copy' => array(
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif'
            ),
            'delete' => array(
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS ['TL_LANG'] ['MSC'] ['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show' => array(
                'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            )
        )
    ),
    // Palettes
    'palettes' => array(
        'default' => '{name_legend},firstname, lastname, function; {address_legend}, street, street_number, postal_code, city; {contact_legend}, phone, email; {image_legend}, image;'
    ),
    // Fields
    'fields' => array(
        'id' => array(
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'pid' => array(
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'tstamp' => array(
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'sorting' => array(
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'firstname' => array(
            'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['firstname'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array(
                'mandatory' => true,
                'tl_class' => 'w50',
                'maxlength' => 255
            ),
            'sql' => "varchar(255) NOT NULL default ''"
        ),
        'lastname' => array(
            'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['lastname'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array(
                'mandatory' => true,
                'tl_class' => 'w50',
                'maxlength' => 255
            ),
            'sql' => "varchar(255) NOT NULL default ''"
        ),
        'function' => array(
            'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['function'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'w50',
                'maxlength' => 255
            ),
            'sql' => "varchar(255) NOT NULL default ''"
        ),
        'street' => array(
            'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['street'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'w50',
                'maxlength' => 255
            ),
            'sql' => "varchar(255) NOT NULL default ''"
        ),
        'street_number' => array(
            'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['street_number'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'w50',
                'maxlength' => 255
            ),
            'sql' => "varchar(255) NOT NULL default ''"
        ),
        'postal_code' => array(
            'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['postal_code'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'w50',
                'maxlength' => 5,
                'rgxp' => 'digit'
            ),
            'sql' => "varchar(5) NOT NULL default ''"
        ),
        'city' => array(
            'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['city'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'w50',
                'maxlength' => 255
            ),
            'sql' => "varchar(255) NOT NULL default ''"
        ),
        'phone' => array(
            'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['phone'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'w50',
                'maxlength' => 255,
                'rgxp' => 'phone'
            ),
            'sql' => "varchar(255) NOT NULL default ''"
        ),
        'email' => array(
            'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['email'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'w50',
                'maxlength' => 255,
                'rgxp' => 'email'
            ),
            'sql' => "varchar(255) NOT NULL default ''"
        ),
        'image' => array(
            'label' => &$GLOBALS ['TL_LANG'] ['tl_person'] ['image'],
            'exclude' => true,
            'search' => false,
            'inputType' => 'fileTree',
            'eval' => array(
                'filesOnly' => true,
                'fieldType' => 'radio',
                'tl_class' => 'clr',
                'extensions' => 'jpg, jpeg, png, gif'
            ),
            'sql' => "binary(16) NULL"
        )
    )
);


