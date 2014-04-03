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
class PersonContentElement extends \ContentElement {
	protected $strTemplate = 'ce_person';
	public function compile() {
		if ($this->personID > 0) {
			$objPerson = \PersonModel::findByPk ( $this->personID );
			$objFile = \FilesModel::findByPk ( $objPerson->image );
			$arrSize = deserialize($this->size);			
			
			$this->Template->firstname = $objPerson->firstname;
			$this->Template->lastname = $objPerson->lastname;
			$this->Template->function = $objPerson->function;
			$this->Template->street = $objPerson->street;
			$this->Template->street_number = $objPerson->street_number;
			$this->Template->postal_code = $objPerson->postal_code;
			$this->Template->city = $objPerson->city;
			$this->Template->phone = $objPerson->phone;
			$this->Template->email = $objPerson->email;
			$this->Template->image = \Image::get($objFile->path, $arrSize[0], $arrSize[1], $arrSize[2]);
			$this->Template->imageSize = 'width="' . $arrSize[0] . '" height="' . $arrSize[1] . '"';
			
		}
	}
}

?>