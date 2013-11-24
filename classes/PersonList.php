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


use Contao\Database;
use Contao\FilesModel;
/**
 * Class PersonList 
 *
 * @copyright  mindbird 2013 
 * @author     mindbird 
 * @package    Devtools
 */
class PersonList extends \Module 
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'person_list';


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		$oDB = Database::getInstance();
		$oModuleParams = $oDB->prepare("SELECT * FROM tl_module WHERE id=?")->limit(1)->execute($this->id);
		$oResult = $oDB->prepare("SELECT * FROM tl_person WHERE pid=?")->execute($oModuleParams->person_archiv);
		$aRows = $oResult->fetchAllAssoc();
		$aPeople = array();
		foreach ($aRows as $aRow) {
			$oFile = FilesModel::findByPk($aRow['image']);
			$aPeople[] = array(
				'firstname' => $aRow['firstname'],
				'lastname' => $aRow['lastname'],
				'function' => $aRow['function'],
				'street' => $aRow['street'],
					'street_number' => $aRow['street_number'],
					'postal_code' => $aRow['postal_code'],
					'city' => $aRow['city'],
					'phone' => $aRow['phone'],
					'email' => $aRow['email'],
					'image' => $oFile->path
			);
		}
		$this->Template->aData = $aPeople;
	}
}
