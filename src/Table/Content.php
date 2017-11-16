<?php

namespace Mindbird\Contao\Person\Table;

use Contao\Backend;
use Mindbird\Contao\Person\Model\Person;
use Mindbird\Contao\Person\Model\PersonArchive;

/**
 * Class Content
 * @package Mindbird\Contao\Person\Table
 */
class Content extends Backend
{
    /**
     * Return all template files of a particular group as array
     * @return array
     */
    public function getPersonTemplates()
    {
        return $this->getTemplateGroup('ce_person');
    }

    /**
     * Returns a list of all person ordered by archive
     * @return array
     */
    public function getPersonList()
    {
        $people = Person::findAll();
        $archives = PersonArchive::findAll();
        $invertedName = true; // lastname, firstname
        $return = array();
        foreach ($archives as $archive) {
            $peopleOfArchive = array();
            foreach ($people as $person) {
                if ($person->pid === $archive->id) {
                    $peopleOfArchive[(string) $person->id] = $person->getFullName($invertedName);
                }
            }
            asort($peopleOfArchive);
            $return[$archive->title] = $peopleOfArchive;
        }
        return $return;
    }
}
