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

use pxn\phpJenkins\Dashboard;
//use pxn\phpJenkins\Exceptions\SourceNotAvailableException;

/**
 * @coversDefaultClass \pxn\phpJenkins\Dashboard
 */
class DashboardTest extends \PHPUnit_Framework_TestCase {

	const TEST_HOST = '127.0.0.1:8080';



	public function testConstruct() {
		// test with sample data
		$source = SourceFake::getByHost(self::TEST_HOST);
		$this->assertNotNull($source);
		$this->assertEquals('pxn\\phpJenkins\\tests\\SourceFake', \get_class($source));
		$this->assertEquals('http://'.self::TEST_HOST, $source->getURL());
		$dash = new Dashboard($source);
		$jobs = $dash->getJobs();
		$jobA = &$jobs['test-job-A'];
		$jobB = &$jobs['test-job-B'];
		// test expected jobs
		$this->assertEquals(2, \count($jobs));
		$this->assertEquals('TestJobA',   $jobA['display']);
		$this->assertEquals('test-job-B', $jobB['display']);
		$this->assertEquals('GOOD',       $jobA['state']);
		$this->assertEquals('GOOD',       $jobB['state']);
		$this->assertEquals('2',          $jobA['lastbuild']);
		$this->assertEquals('3',          $jobB['lastbuild']);
	}



}
