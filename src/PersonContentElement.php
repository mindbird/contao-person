<?php

/**
 * @package   Person
 * @author    mindbird
 * @license   GNU/LGPL
 * @copyright mindbird 2014
 */

/**
 * Namespace
 */
namespace Person;

/**
 * Class PersonContentElement
 *
 * @copyright mindbird 2014
 * @author mindbird
 * @package person
 */
class PersonContentElement extends \ContentElement
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
            $objTemplate = new \BackendTemplate ('be_wildcard');

            $objTemplate->wildcard = '### PERSONEN CONTENT ELEMENT ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
        }

        if ($this->personTpl) {
            $this->strTemplate = $this->personTpl;
        }

        return parent::generate();
    }

    public function compile()
    {
        if ($this->personID > 0) {
            $objPerson = \PersonModel::findByPk($this->personID);
            $arrSize = deserialize($this->size);

            if ($objPerson) {
                $arrData = $this->getArrayOfPerson($objPerson, $arrSize [0], $arrSize [1], $arrSize [2]);
                foreach ($arrData as $strName => $strValue) {
                    $this->Template->$strName = $strValue;
                }
            }
        }
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

?>