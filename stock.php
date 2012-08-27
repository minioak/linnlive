<?php

/* ***************************************************************
// LinnLive Stock
// Copyright (c) 2012 John Mitchell - http://www.minioak.com
// 
// Version: 1.0.0 (1/8/2012)
// 
// Licensed under the MIT license:
// http://www.opensource.org/licenses/mit-license.php
// ***************************************************************/

require_once(dirname(__FILE__).'/linnlive.php');

class LinnLive_stock extends LinnLive_request
{

	
	/**
	 * get function.
	 * 
	 * @access public
	 * @param array $params (default: array())
	 * @return void
	 */
	public function get($params = array())
    {
    	$request = new GetStockItem();
		$request->filter = new StockItemFilter();
		
		if (isset($params['filter']))
		{
			$filter = $params['filter'];
			
			if (isset($filter['stock_id']))
			{
				$request->filter->pkStockItemId = $filter['stock_id'];
				$request->filter->IsSetpkStockItemId = true;
			}
			
			if (isset($filter['sku']))
			{
				$request->filter->SKU = $filter['sku'];
				$request->filter->IsSetSKU = true;
			}
			
			if (isset($filter['barcode']))
			{
				$request->filter->BarcodeNumber = $filter['barcode'];
				$request->filter->IsSetBarcodeNumber = true;
			}
			
			if (isset($filter['title']))
			{
				$request->filter->ItemTitle = $filter['title'];
				$request->filter->IsSetItemTitle = true;
			}
		}
		
	    try 
	    {
	    	$response = $this->call_service('InventoryClient', 'GetStockItem', $request);
	    } 
	    catch (Exception $e) 
	    {
		    return new LinnLive_response(false, $e->getMessage(), LinnLive_response::FAILED);
	    }
	    
	    return new LinnLive_response($response->GetStockItemResult->StockItems->StockItem);
    }
    
    /**
     * update function.
     * 
     * @access public
     * @param array $params (default: array($params = array())
     * @return LinnLive_response or array of LinnLive_response
     */
    public function update($params = array())
    {
	    $this->require_params(array('stock_id'), $params);
	    
	    $requests = array();
	    $results = array();
	    
	    if (isset($params['price']))
	    {
		    $price_request = new UpdateStockItemListingPrice();
		    $price_request->Delete = false;
		    $price_request->pkStockItemid = $params['stock_id'];
		    $price_request->channelPrice = new StockItemListingPrice();
		    $price_request->channelPrice->SalePrice = $params['price'];
		    
		    $requests['UpdateStockItemListingPrice'] = array(
		    	'type' => 'price',
		    	'data' => $price_request,
		    	'result' => 'UpdateStockItemListingPriceResult'
		    );
	    }
	    
	    if (isset($params['stock_level']))
	    {
		    $requests['ChangeStockLevel'] = array(
		    	'type' => 'stock_level',
		    	'data' => $this->_get_stock_level_request($params),
		    	'result' => 'ChangeStockLevelResult'
		    );
	    }
	    
	    foreach ($requests as $method => $request)
	    {
		    try 
		    {
		    	$response = $this->call_service('InventoryClient', $method, $request['data']);
		    
			    $results[$request['type']] = new LinnLive_response($response->$request['result']);
		    } 
		    catch (Exception $e) 
		    {
			    $results[$request['type']] = new LinnLive_response(false, $e->getMessage(), LinnLive_response::FAILED);
		    }
	    }
	    
	    if (sizeof($results) == 1)
	    {
	    	reset($results);
	    	return $results[key($results)];
	    }
	    
	    return $results;
    }
    
    
    private function _get_stock_level_request($params = array())
    {
    	$this->require_params(array('stock_id', 'location', 'stock_level'), $params);
    	
	    $request = new ChangeStockLevel();
	    $request->pkStockItemId = new guid($params['stock_id']);
	    $request->UpdateSource = 'API';
	    
	    $level = new StockItemLevel();
	    $level->Location = $params['location'];
	    $level->Level = $params['stock_level'];
	    $level->IsSetLevel = true;
	    
	    $request->stocklevel = $level;
	    
	    return $request;
    }
}