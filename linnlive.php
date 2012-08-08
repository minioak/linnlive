<?php

/* ***************************************************************
// LinnLive
// Copyright (c) 2012 John Mitchell - http://www.minioak.com
// 
// Version: 1.0.0 (1/8/2012)
// 
// Dual licensed under the MIT and GPL licenses:
// http://www.opensource.org/licenses/mit-license.php
// http://www.gnu.org/licenses/gpl.html
// ***************************************************************/

require_once(dirname(__FILE__).'/libraries/linnlive/inventory.php');
require_once(dirname(__FILE__).'/libraries/linnlive/order.php');

class LinnLive 
{
	protected $settings = array();
		
	protected function default_settings()
	{
		return array(
			'api_key' => ''
		);
	}
	
	protected function require_params($params = array(), $supplied)
	{
		foreach($params as $param)
		{
			if (!isset($supplied[$param])) throw new Exception("Param $param was expected but not supplied.");
		}
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
    
    public function get_stock($params = array())
    {
    	$request = new GetStockItem();
		$request->filter = new StockItemFilter();
	    try 
	    {
	    	$response = $this->call_service('InventoryClient', 'GetStockItem', $request);
	    } 
	    catch (Exception $e) 
	    {
		    return new LinnLive_response(LinnLive_response::FAILED, $e->getMessage());
	    }
	    
	    return new LinnLive_response(LinnLive_response::SUCCESS, $response->GetStockItemResult->StockItems->StockItem);
    }
    
    public function add_order($params = array())
    {
    	$this->require_params(array(), $params);
    }
}

class LinnLive_response
{
	const SUCCESS = 'successful';
	const FAILED = 'failed';
	
	protected $_message;
	protected $_status;
	protected $_data;
	
	public function __construct($status, $data = false, $message = false)
	{
		if ($data)
		{
			$this->_status = LinnLive_response::SUCCESS;
			$this->_message = $message;
			$this->_data = objectToArray($data);
		}
		else
		{
			$this->_status = LinnLive_response::FAILED;
			$this->_message = $message;
		}
	}
	
	public function message()
	{
		return $_message;
	}
	
	public function status()
	{
		return $_status;
	}
	
	public function data()
	{
		return $_data;
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