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

class SourceFakeInvalid extends \pxn\phpJenkins\Source {



	protected function wget($url) {
		return <<<EOF
{
  ]
}
EOF;
	}



}
