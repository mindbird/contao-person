<?php

/**
 * Namespace
 */
namespace Person;

class ModulePersonList extends \Module
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
            $objTemplate = new \BackendTemplate ('be_wildcard');

            $objTemplate->wildcard = '### PERSONEN LISTE ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
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
        $objPeople = \PersonModel::findBy('pid', $this->person_archiv, array('order' => 'sorting ASC'));
        $arrSize = deserialize($this->imgSize);
        if ($objPeople) {
            $strHTML = '';
            while ($objPeople->next()) {
                $objTemplate = new \FrontendTemplate ($this->personTpl);
                $arrData = $this->getArrayOfPerson($objPeople, $arrSize [0], $arrSize [1], $arrSize [2]);
                foreach ($arrData as $strName => $strValue) {
                    $objTemplate->$strName = $strValue;
                }
                $strHTML .= $objTemplate->parse();
            }
        }

        $this->Template->strPeople = $strHTML;
    }

    /**
     * Return array of person
     *
     * @param object $objPerson
     * @param number $intWidth
     * @param number $intHeigth
     * @param string $strPosition
     * @return array
     */
    protected function getArrayOfPerson($objPerson, $intWidth = 0, $intHeight = 0, $strPosition = 'proportional')
    {
        $arrData = $objPerson->row();
        $objFile = \FilesModel::findByPk($objPerson->image);
        $arrData ['image'] = \Image::get($objFile->path, $intWidth, $intHeight, $strPosition);

        $arrData ['imageSize'] = 'width="' . $intWidth . '" height="' . $intHeight . '"';

        return $arrData;
    }
}
