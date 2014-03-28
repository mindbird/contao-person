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
 * @package Devtools
 */
class PersonList extends \Module {
	
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
		$objResult = $this->Database->prepare ( "SELECT * FROM tl_person WHERE pid=?" )->execute ( $this->person_archiv );
		$arrRows = $objResult->fetchAllAssoc ();
		$this->Template->strPeople = $this->getPeople ( $arrRows );
	}
	
	/**
	 * Return string/html of all people
	 * 
	 * @param array $arrPeople DB query rows as array
	 * @return string
	 */
	protected function getPeople($arrPeople) {
		$strHTML = '';
		//print '<pre>';
		foreach ( $arrPeople as $arrPerson ) {
			$objTemplate = new \FrontendTemplate ( 'person_list' );
			$objFile = \FilesModel::findByPk ( $arrPerson ['image'] );
			$arrSize = deserialize($this->imgSize);			
			
			$objTemplate->firstname = $arrPerson ['firstname'];
			$objTemplate->lastname = $arrPerson ['lastname'];
			$objTemplate->function = $arrPerson ['function'];
			$objTemplate->street = $arrPerson ['street'];
			$objTemplate->street_number = $arrPerson ['street_number'];
			$objTemplate->postal_code = $arrPerson ['postal_code'];
			$objTemplate->city = $arrPerson ['city'];
			$objTemplate->phone = $arrPerson ['phone'];
			$objTemplate->email = $arrPerson ['email'];
			$objTemplate->image = \Image::get($objFile->path, $arrSize[0], $arrSize[1], $arrSize[2]);
			$objTemplate->imageSize = 'width="' . $arrSize[0] . '" height="' . $arrSize[1] . '"';
			
			$strHTML .= $objTemplate->parse ();
		}
		
		return $strHTML;
	}
}
