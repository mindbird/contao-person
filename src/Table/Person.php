<?php

namespace Mindbird\Contao\Person\Table;

class Person
{
    public function listPerson($row)
    {
        if ($row['image'] != null) {
            $file = \FilesModel::findByPk(deserialize($row['image']));
            $singleSRC = $file->path;
            $sReturn = '<figure style="float: left; margin-right: 1em;"><img src="' . Image::get($singleSRC, 80, 80,
                    'center_top') . '"></figure>';
        }
        $sReturn .= '<div>' . $row ['lastname'] . ', ' . $row ['firstname'] . '</div>';

        return $sReturn;
    }

}