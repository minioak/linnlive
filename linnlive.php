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
	    return $this->call_service('InventoryClient', 'GetStockItem', $request);
	    
    }
}
