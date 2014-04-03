<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package   Person 
 * @author    mindbird 
 * @license   GNU/LGPL 
 * @copyright mindbird 2013 
 */

/**
 * Namespace
 */
namespace Person;

/**
 * Class PersonList
 *
 * @copyright mindbird 2013
 * @author mindbird
 * @package person
 */
class ModulePersonList extends \Module {
	
	/**
	 * Template
	 *
	 * @var string
	 */
	protected $strTemplate = 'mod_personlist';
	
	/**
	 * Generate the module
	 */
	protected function compile() {
		$objPeople = \PersonModel::findBy('pid', $this->person_archiv);
		$this->Template->strPeople = $this->getPeople ( $objPeople );
	}
	
	/**
	 * Return string/html of all people
	 * 
	 * @param array $arrPeople DB query rows as array
	 * @return string
	 */
	protected function getPeople($objPeople) {
		while ($objPeople->next()) {
			$objTemplate = new \FrontendTemplate ( 'person_list' );
			$objFile = \FilesModel::findByPk ( $objPeople->image );
			$arrSize = deserialize($this->imgSize);			
			
			$objTemplate->firstname = $objPeople->firstname;
			$objTemplate->lastname = $objPeople->lastname;
			$objTemplate->function = $objPeople->function;
			$objTemplate->street = $objPeople->street;
			$objTemplate->street_number = $objPeople->street_number;
			$objTemplate->postal_code = $objPeople->postal_code;
			$objTemplate->city = $objPeople->city;
			$objTemplate->phone = $objPeople->phone;
			$objTemplate->email = $objPeople->email;
			$objTemplate->image = \Image::get($objFile->path, $arrSize[0], $arrSize[1], $arrSize[2]);
			$objTemplate->imageSize = 'width="' . $arrSize[0] . '" height="' . $arrSize[1] . '"';
			
			$strHTML .= $objTemplate->parse ();
		}
		
		return $strHTML;
	}
}
