<?php
/**
 * Jenkins API Library
 *
 * @copyright 2015
 * @license GPL-3
 * @author lorenzo at poixson.com
 * @link http://poixson.com/
 */
namespace pxn\phpJenkins\tests;

class SourceFake extends \pxn\phpJenkins\Source {



	protected function wget() {
		return FakeJSON::viewAll();
	}



}
