<?php

namespace AppBundle\NasaApi;

class NasaApiClient {

	private $read_only = array('api_key', 'soundcloud_client_id');
	private $api_key;
	private $soundcloud_client_id;
	private $buzz;

	function __construct($api_key, $soundcloud_client_id, $buzz) {
		$this->api_key = $api_key;
		$this->soundcloud_client_id = $soundcloud_client_id;
		$this->buzz = $buzz;
	}

	function __get($prop) {
		if (in_array($prop, $this->read_only)) {
			return $this->$prop;
		}
	}

	function getSounds($options = array()) {
    	$req = 'https://api.nasa.gov/planetary/sounds?api_key='.$this->api_key;

    	if (is_array($options) && isset($options->query) && !empty($options->query)) {
    		$req = $req.'&q='.$options->query;
    	}
    	
    	return $this->buzz->get($req);
	}
}