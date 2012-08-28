<?php

/* ***************************************************************
// LinnLive
// Copyright (c) 2012 John Mitchell - http://www.minioak.com
// 
// Version: 1.0.0 (1/8/2012)
// 
// Licensed under the MIT licenses:
// http://www.opensource.org/licenses/mit-license.php
// ***************************************************************/

require_once(dirname(__FILE__).'/libraries/linnlive/inventory.php');
require_once(dirname(__FILE__).'/libraries/linnlive/order.php');

class LinnLive_request
{
	protected $settings = array();
	protected $order_status = array('unpaid', 'paid', 'return', 'pending', 'resend');
		
	protected function default_settings()
	{
		return array(
			'api_key' => '',
			'tax_rate' => 20,
			'currency_code' => 'GBP'
		);
	}
	
	protected function require_params($params = array(), $supplied)
	{
		foreach($params as $param)
		{
			if (!isset($supplied[$param])) throw new Exception("Param $param was expected but not supplied.");
		}
	}
	
	protected function require_one_of($params = array(), $supplied)
	{
		foreach($params as $param)
		{
			if (isset($supplied[$param])) return;
		}
		throw new Exception("One of {print_r($params)} was expected but none were supplied.");
	}
	
	protected function call_service($service, $method, $request)
	{
		$client = new $service();
		$request->Token = $this->settings['api_key'];
		return $client->$method($request);
	}
	
	public function __construct()
	{
		// initialize default settings
		foreach ($this->default_settings() as $key => $default)
		{
			$this->settings[$key] = $default;
		}
	}
		
	public function initialize($settings)
    {
	    foreach ($this->default_settings() as $key => $default)
	    {
            if (isset($settings[$key]))
            {
                // boolean settings must remain booleans
                $this->settings[$key] = is_bool($default) ? (bool)$settings[$key] : $settings[$key];
            }
	    }
    }
}

class LinnLive_response
{
	const SUCCESS = 'successful';
	const FAILED = 'failed';
	
	protected $_message = false;
	protected $_status = false;
	protected $_response = false;
	
	public function __construct($response, $message = false, $status = false)
	{
		if ($status) $this->_status = $status;
		if ($message) $this->_message = $message;
		
		$this->_response = $response;
	}
	
	public function message()
	{
		if ($this->_message) return $this->_message;
		
		if (is_object($this->_response) && property_exists(get_class($this->_response), 'Error'))
		{
			return $this->_response->Error;
		}

		return '';
	}
	
	public function status()
	{
		if ($this->_status) return $this->_status;
		
		if (is_object($this->_response) && property_exists(get_class($this->_response), 'ErrorNum'))
		{
			return ($this->_response->ErrorNum === 0) ? self::SUCCESS : self::FAILED;
		}
		
		return ($this->_response) ? self::SUCCESS : self::FAILED;
	}
	
	public function data()
	{
		return objectToArray($this->_response);
	}
	
	public function rawdata()
	{
		return $this->_response;
	}
}

function objectToArray($d) {
	if (is_object($d)) {
		// Gets the properties of the given object
		// with get_object_vars function
		$d = get_object_vars($d);
	}

	if (is_array($d)) {
		/*
		* Return array converted to object
		* Using __FUNCTION__ (Magic constant)
		* for recursive call
		*/
		return array_map(__FUNCTION__, $d);
	}
	else {
		// Return array
		return $d;
	}
}
