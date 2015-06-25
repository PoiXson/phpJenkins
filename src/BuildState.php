<?php
/**
 * psmJenkins API library
 *
 * @copyright 2015
 * @license GPL-3
 * @author lorenzo at poixson.com
 * @link http://poixson.com/
 */
namespace pxn\phpJenkins;

use pxn\phpUtils\BasicEnum;
use pxn\phpUtils\Strings;

class BuildState extends BasicEnum {

	const GOOD     = 'blue';
	const FAILED   = 'red';
	const BUILDING = 'building';
	const NOTBUILT = 'notbuilt';
	const DISABLED = 'disabled';



	public static function isValidValue($value, $ignoreCase=TRUE) {
		if(Strings::EndsWith($value, '_anime', $ignoreCase))
			return TRUE;
		return parent::isValidValue($value, $ignoreCase);
	}



	public static function getByValue($value, $ignoreCase=TRUE) {
		if(Strings::EndsWith($value, '_anime', $ignoreCase))
			return 'BUILDING';
		return parent::getByValue($value, $ignoreCase);
	}



}
