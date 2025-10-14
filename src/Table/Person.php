<?php

namespace Mindbird\Contao\Person\Table;

use Contao\BackendTemplate;
use Contao\FilesModel;
use Contao\Image;
use Contao\StringUtil;

class Person
{
    public function listPerson(array $row): string
    {
        $template = new BackendTemplate('backend/person');
        if ($row['image'] != null) {
            $file = FilesModel::findByPk(StringUtil::deserialize($row['image']));
            $template->image = $file->path;
        }

        $template->firstname = $row['firstname'];
        $template->lastname = $row['lastname'];

        return $template->parse();
    }

}