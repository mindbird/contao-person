<?php

namespace Mindbird\Contao\Person\Content;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\Controller;
use Contao\FilesModel;

/**
 * Class Person
 *
 * @copyright mindbird 2014
 * @author mindbird
 * @package person
 */
class Person extends ContentElement
{

    /**
     * Template
     *
     * @var string
     */
    protected $strTemplate = 'ce_person';

    /**
     * (non-PHPdoc)
     * @see \Contao\Module::generate()
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new BackendTemplate ('be_wildcard');
            $template->wildcard = '### PERSONEN CONTENT ELEMENT ###';
            $template->title = $this->headline;
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;
            return $template->parse();
        }

        if ($this->personTpl) {
            $this->strTemplate = $this->personTpl;
        }

        return parent::generate();
    }

    public function compile()
    {
        if ($this->personID > 0) {
            $person = \Mindbird\Contao\Person\Model\Person::findByPk($this->personID);
            $size = deserialize($this->size);

            if ($person) {
                $arrData = $this->getArrayOfPerson($person, $size);
                foreach ($arrData as $strName => $strValue) {
                    $this->Template->$strName = $strValue;
                }
                Controller::addImageToTemplate($this->Template, $arrData);
            }
        }
    }

    /**
     * Return array of person
     *
     * @param object $person
     * @param array $arrSize
     * @return array
     */
    protected function getArrayOfPerson($person, $arrSize)
    {
        $data = $person->row();
        $objFile = FilesModel::findByPk($person->image);
        $data ['singleSRC'] = $objFile->path;
        $data ['size'] = $arrSize;
        $data ['alt'] = $person->firstname . ' ' . $person->lastname;
        return $data;
    }
}
