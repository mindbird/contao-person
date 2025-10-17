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
        if ($row['function'] != null) {
            $template->function = $row['function'];
        }
        if ($row['email'] != null) {
            $template->email = $row['email'];
        }
        if ($row['phone'] != null) {
            $template->phone = $row['phone'];
        }

        return $template->parse();
    }

}