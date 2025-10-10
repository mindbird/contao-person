<?php

namespace Mindbird\Contao\Person\Model;

class Person extends \Contao\Model
{

    /**
     * Name of the table
     * @var string
     */
    protected static $strTable = 'tl_person';

    public function getFullName($inverted = false): string
    {
        if ($inverted) {
            return $this->lastname . ', ' . $this->firstname;
        }
        return $this->firstname . ' ' . $this->lastname;
    }

}
