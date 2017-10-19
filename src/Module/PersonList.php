<?php

namespace Mindbird\Contao\Person\Module;

use Contao\BackendTemplate;
use Contao\Module;
use Contao\Controller;
use Contao\FilesModel;
use Contao\FrontendTemplate;
use Mindbird\Contao\Person\Model\Person;

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
        if (TL_MODE == 'BE') {
            $template = new BackendTemplate ('be_wildcard');
            $template->wildcard = '### PERSONEN LISTE ###';
            $template->title = $this->headline;
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;
            return $template->parse();
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
        $person = Person::findBy('pid', $this->person_archiv, array('order' => 'sorting ASC'));
        $size = deserialize($this->imgSize);
        if ($person) {
            $html = '';
            while ($person->next()) {
                $objTemplate = new FrontendTemplate ($this->personTpl);
                $data = $this->getArrayOfPerson($person, $size);
                foreach ($data as $strName => $strValue) {
                    $objTemplate->$strName = $strValue;
                }
                Controller::addImageToTemplate($objTemplate, $data);
                $html .= $objTemplate->parse();
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
        $objFile = FilesModel::findByPk($person->image);
        $arrData ['singleSRC'] = $objFile->path;
        $arrData ['size'] = $size;
        $arrData ['alt'] = $person->firstname . ' ' . $person->lastname;
        return $arrData;
    }
}
