<?php
/**
 * PoiXson phpUtils
 *
 * @copyright 2004-2015
 * @license GPL-3
 * @author lorenzo at poixson.com
 * @link http://poixson.com/
 */
namespace pxn\phpJenkins\tests;

use pxn\phpJenkins\BuildState;

/**
 * @coversDefaultClass \pxn\phpJenkins\BuildState
 */
class BuildStateTest extends \PHPUnit_Framework_TestCase {



	/**
	 * @covers ::isValidName
	 * @covers ::getByName
	 */
	public function testByName() {
		// isValidName
		$this->assertTrue(BuildState::isValidName('GOOD'    ));
		$this->assertTrue(BuildState::isValidName('FAILED'  ));
		$this->assertTrue(BuildState::isValidName('BUILDING'));
		$this->assertTrue(BuildState::isValidName('NOTBUILT'));
		$this->assertTrue(BuildState::isValidName('DISABLED'));
		// getByName
		$this->assertEquals('blue',     BuildState::getByName('GOOD'    ));
		$this->assertEquals('red',      BuildState::getByName('FAILED'  ));
		$this->assertEquals('notbuilt', BuildState::getByName('NOTBUILT'));
		$this->assertEquals('disabled', BuildState::getByName('DISABLED'));
	}



	/**
	 * @covers ::isValidValue
	 * @covers ::getByValue
	 */
	public function testByValue() {
		// isValidValue
		$this->assertTrue(BuildState::isValidValue('blue'      ));
		$this->assertTrue(BuildState::isValidValue('red'       ));
		$this->assertTrue(BuildState::isValidValue('building'  ));
		$this->assertTrue(BuildState::isValidValue('notbuilt'  ));
		$this->assertTrue(BuildState::isValidValue('disabled'  ));
		$this->assertTrue(BuildState::isValidValue('blue_anime'));
		$this->assertTrue(BuildState::isValidValue('red_anime' ));
		// getByValue
		$this->assertEquals('GOOD',     BuildState::getByValue('blue'      ));
		$this->assertEquals('FAILED',   BuildState::getByValue('red'       ));
		$this->assertEquals('NOTBUILT', BuildState::getByValue('notbuilt'  ));
		$this->assertEquals('DISABLED', BuildState::getByValue('disabled'  ));
		$this->assertEquals('BUILDING', BuildState::getByValue('blue_anime'));
		$this->assertEquals('BUILDING', BuildState::getByValue('red_anime' ));
	}



}
