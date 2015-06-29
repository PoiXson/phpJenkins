<?php
/**
 * Jenkins API Library
 *
 * @copyright 2015
 * @license GPL-3
 * @author lorenzo at poixson.com
 * @link http://poixson.com/
 */
namespace pxn\phpJenkins\examples;

if(\file_exists(__DIR__.'/../vendor/autoload.php'))
	require_once(__DIR__.'/../vendor/autoload.php');

use pxn\phpJenkins\Source;
use pxn\phpJenkins\Dashboard;
use pxn\phpJenkins\Exceptions\SourceNotAvailableException;

const EOL = \pxn\phpUtils\Defines::EOL;
const TAB = \pxn\phpUtils\Defines::TAB;

try {
	$source = Source::getByHost('127.0.0.1:8080');
	$dash = new Dashboard($source);
	$jobs = $dash->getJobs();

	echo '<table border="1" cellpadding="10" width="500">'.EOL;
	echo '<tr>'.EOL;
	echo TAB.'<th><font size="+1">Project</font></th>'.EOL;
	echo TAB.'<th><font size="+1">State</font></th>'.EOL;
	echo TAB.'<th><font size="+1">LastBuild</font></th>'.EOL;
	echo '</tr>'.EOL;

	$colors = [
			'GOOD'     => 'green',
			'FAILED'   => 'red',
			'BUILDING' => 'orange',
			'NOTBUILT' => 'gray',
			'DISABLED' => 'pink'
	];

	foreach($jobs as $name => $job) {
		if($name == 'update-repos')
			$url = 'http://dl.poixson.com/';
		else
			$url = 'http://dl.poixson.com/'.$name.'/';
		echo '<tr>'.EOL;
		echo TAB.'<td><a href="'.$url.'"><font size="+1">'.$job['display'].'</font></a></td>'.EOL;
		echo TAB.'<td align="center" style="background-color: '.$colors[$job['state']].';">'.
				'<b>'.$job['state'].'</b></td>'.EOL;
		echo TAB.'<td align="center">'.$job['lastbuild'].'</td>'.EOL;
		echo '</tr>'.EOL;
	}

	echo '</table>'.EOL;
} catch (SourceNotAvailableException $e) {
	$e->printStackTrace();
	exit();
}
