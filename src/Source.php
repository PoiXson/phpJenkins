<?php
/**
 * Jenkins API Library
 *
 * @copyright 2015
 * @license GPL-3
 * @author lorenzo at poixson.com
 * @link http://poixson.com/
 */
namespace pxn\phpJenkins;

use pxn\phpJenkins\Exceptions\SourceNotAvailableException;

class Source {

	protected $url;
	protected $jsonCache = [];



	public static function getByHost($host, $ssl=FALSE) {
		if(empty($host))
			throw new SourceNotAvailableException('Source host must be provided!');
		return new static($host, $ssl);
	}
	public function __construct($host, $ssl=FALSE) {
		if(empty($host))
			throw new SourceNotAvailableException('Source url must be provided!');
		if(\strpos($host, '://') === FALSE)
			$this->url = 'http'.($ssl ? 's' : '' ).'://'.$host;
		else
			$this->url = $host;
	}



	/**
	 *
	 * @param string $path
	 * @param unknown $args
	 * @throws SourceNotAvailableException
	 * @return json
	 */
	public function getJson($path='', $args=array()) {
		if(empty($path))
			$path = '/view/All/';
		if(\substr($path, 0, 1) != '/')
			$path = '/'.$path;
		if(\substr($path, -1, 1) != '/')
			$path .= '/';
		if(\strpos($path, '/api/') === FALSE)
			$path .= 'api/json/';
		if(!is_array($args))
			$args = array();
		if(!isset($args['pretty']) || empty($args['pretty']))
			$args['pretty'] = 'true';
		// get api url
		$api_url = $this->url.$path;
		if(count($args) > 0) {
			$api_url .= '?';
			$first = TRUE;
			foreach($args as $k => $v) {
				if($first) {
					$first = FALSE;
				} else {
					$api_url .= '&';
				}
				$api_url .= $k.'='.$v;
			}
		}
		// if cached
		if(isset($this->jsonCache[$api_url]))
			return $this->jsonCache[$api_url];
		// jenkins api request
		$data = $this->wget($api_url);
		if(empty($data)) {
			throw new SourceNotAvailableException(
					\sprintf('Source could not be downloaded from %s', $api_url)
			);
		}
		// decode json
		$json = \json_decode($data);
		unset($data);
		if(!$json) {
			throw new SourceNotAvailableException(
					\sprintf('Downloaded source seems to be invalid JSON! %s', $api_url)
			);
		}
		// cache it
		$this->jsonCache[$api_url] = $json;
		// done
		return $json;
	}



	protected function wget($url) {
		return \file_get_contents($url);
	}



	public function getURL() {
		return $this->url;
	}



}
