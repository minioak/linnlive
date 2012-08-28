 <?php

/* ***************************************************************
// LinnLive Locations
// Copyright (c) 2012 John Mitchell - http://www.minioak.com
// 
// Version: 1.0.0 (1/8/2012)
// 
// Licensed under the MIT license:
// http://www.opensource.org/licenses/mit-license.php
// ***************************************************************/

require_once(dirname(__FILE__).'/linnlive.php');

class LinnLive_locations extends LinnLive_request
{
	
	public function get($params = array())
	{
		try 
	    {
	    	$response = $this->call_service('GenericClient', 'GetLocations', new GetLocations());
	    
		    return new LinnLive_response($response->GetLocationsResult->DataObj->StockItemLocation);
	    } 
	    catch (Exception $e) 
	    {
		    return new LinnLive_response(false, $e->getMessage(), LinnLive_response::FAILED);
	    }
	}
	
}