<?php

namespace Mindbird\Contao\Person\Table;

use Contao\FilesModel;
use Contao\Image;

/**
 * Class Person
 * @package Mindbird\Contao\Person\Table
 */
class Person
{
    /**
     * Returns the description of a row
     * @param array $row DB row of tl_person
     * @return string
     */
    public function listPerson($row)
    {
        $return = '';
        if ($row['image'] != null) {
            $file = FilesModel::findByPk(deserialize($row['image']));
            $singleSRC = $file->path;
            $return = '<figure style="float: left; margin-right: 1em;"><img src="' .
                Image::get($singleSRC, 80, 80, 'center_top') .
                '"></figure>';
        }
        $return .= '<div>' .
            $row ['lastname'] .
            ', ' .
            $row ['firstname'] .
            '</div>';

        return $return;
    }

}