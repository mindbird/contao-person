<?php

namespace Mindbird\Contao\Person\Table;

use Contao\FilesModel;
use Contao\Image;
use Contao\StringUtil;

class Person
{
    public function listPerson(array $row): string
    {
        $return = '';
        if ($row['image'] != null) {
            $file = FilesModel::findByPk(StringUtil::deserialize($row['image']));
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