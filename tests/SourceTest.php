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

	const TEST_HOST = '127.0.0.1:8080';



	/**
	 * @covers ::getByHost
	 */
	public function testByHost() {
		// test http://
		$source = Source::getByHost(self::TEST_HOST, FALSE);
		$this->assertNotNull($source);
		$this->assertEquals('http://'.self::TEST_HOST, $source->getHost());
		// test https://
		$source = Source::getByHost(self::TEST_HOST, TRUE);
		$this->assertNotNull($source);
		$this->assertEquals('https://'.self::TEST_HOST, $source->getHost());
		// test default
		$source = Source::getByHost('http://'.self::TEST_HOST);
		$this->assertNotNull($source);
		$this->assertEquals('http://'.self::TEST_HOST, $source->getHost());
	}



	public function testSource_EmptyJson() {
		$source = new SourceFakeBlank(self::TEST_HOST);
		$this->assertNotNull($source);
		try {
			$source->getJson();
		} catch (SourceNotAvailableException $e) {
			$this->assertEquals(
					\sprintf('Source could not be downloaded '.
							'from http://%s/view/All/api/json/?pretty=true',
							self::TEST_HOST),
					$e->getMessage()
			);
			return;
		}
	}
	public function testSource_InvalidJson() {
		$source = new SourceFakeInvalid(self::TEST_HOST);
		$this->assertNotNull($source);
		try {
			$source->getJson();
		} catch (SourceNotAvailableException $e) {
			$this->assertEquals(
					\sprintf('Downloaded source seems to be invalid JSON! from '.
							'http://%s/view/All/api/json/?pretty=true',
							self::TEST_HOST),
					$e->getMessage()
			);
			return;
		}
		$this->assertTrue(FALSE, 'Failed to throw expected exception');
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
					'Source host must be provided!',
					$e->getMessage()
			);
			return;
		}
		$this->assertTrue(FALSE, 'Failed to throw expected exception');
	}



}
