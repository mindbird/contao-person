<?php

namespace Mindbird\Contao\Person\Module;

use Contao\BackendTemplate;
use Contao\Controller;
use Contao\FilesModel;
use Contao\FrontendTemplate;
use Contao\Module;
use Contao\StringUtil;
use Mindbird\Contao\Person\Model\Person;

/**
 * Class PersonList
 * @package Mindbird\Contao\Person\Module
 */
class PersonList extends Module
{

    /**
     * Template
     *
     * @var string
     */
    protected $strTemplate = 'mod_personlist';

    /**
     * Template person entry
     *
     * @var string
     */
    protected $strTemplatePerson = 'person_list';

    /**
     * (non-PHPdoc)
     *
     * @see \Contao\Module::generate()
     */
    public function generate()
    {
        if (TL_MODE === 'BE') {
            $template = new BackendTemplate ('be_wildcard');
            $template->wildcard = '### PERSONEN LISTE ###';
            $template->title = $this->headline;
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $template->parse();
        }

        if ($this->customTpl) {
            $this->strTemplate = $this->customTpl;
        }

        if ($this->personTpl) {
            $this->strTemplatePerson = $this->personTpl;
        }

        return parent::generate();
    }

    /**
     * Generate the module
     */
    protected function compile()
    {
        $person = Person::findBy(
            'pid',
            $this->person_archiv, array('order' => 'sorting ASC')
        );
        $size = StringUtil::deserialize($this->imgSize);
        $html = '';
        if ($person) {
            while ($person->next()) {
                $template = new FrontendTemplate($this->strTemplatePerson);
                $data = $this->getArrayOfPerson($person, $size);
                foreach ($data as $name => $value) {
                    $template->$name = $value;
                }
                if ($data['singleSRC'] !== null) {
                    Controller::addImageToTemplate($template, $data);
                }
                $html .= $template->parse();
            }
        }

        $this->Template->strPeople = $html;
    }

    /**
     * Return array of person
     *
     * @param object $person
     * @param array $size
     * @return array
     */
    protected function getArrayOfPerson($person, $size)
    {
        $arrData = $person->row();
        $file = FilesModel::findByPk($person->image);
        $arrData ['singleSRC'] = $file->path;
        $arrData ['size'] = $size;
        $arrData ['alt'] = $person->firstname . ' ' . $person->lastname;
        $arrData ['description'] = StringUtil::toHtml5($person->description);

        return $arrData;
    }
}
