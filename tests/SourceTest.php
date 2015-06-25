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

use pxn\phpJenkins\Source;
use pxn\phpJenkins\Exceptions\SourceNotAvailableException;

/**
 * @coversDefaultClass \pxn\phpJenkins\Source
 */
class SourceTest extends \PHPUnit_Framework_TestCase {



	/**
	 * @covers ::getByHost
	 */
	public function testByHost() {
		// test http://
		$source = Source::getByHost('127.0.0.1', FALSE);
		$this->assertNotNull($source);
		$this->assertEquals('http://127.0.0.1', $source->getURL());
		// test https://
		$source = Source::getByHost('127.0.0.1', TRUE);
		$this->assertNotNull($source);
		$this->assertEquals('https://127.0.0.1', $source->getURL());
	}
	/**
	 * @covers ::getByHost
	 */
	public function testByHost_BlankString() {
		try {
			Source::getByHost('');
		} catch (SourceNotAvailableException $e) {
			$this->assertEquals(
					'Source host must be provided!',
					$e->getMessage()
			);
			return;
		}
		$this->assertTrue(FALSE, 'Failed to throw expected exception');
	}
	public function testConstruct_BlankString() {
		try {
			new Source('');
		} catch (SourceNotAvailableException $e) {
			$this->assertEquals(
					'Source url must be provided!',
					$e->getMessage()
			);
			return;
		}
		$this->assertTrue(FALSE, 'Failed to throw expected exception');
	}



}
