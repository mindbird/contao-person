<?php

namespace Mindbird\Contao\Person\Table;

use Contao\Backend;
use Mindbird\Contao\Person\Model\Person;
use Mindbird\Contao\Person\Model\PersonArchive;

class Content extends Backend
{
    public function getPersonTemplates(): array
    {
        return $this->getTemplateGroup('ce_person');
    }

    public function getPersonList(): array
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
