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

class Stock extends LinnLive_request
{
	public function get($params = array())
    {
    	$request = new GetStockItem();
		$request->filter = new StockItemFilter();
		
		if (isset($params['stock_id']))
		{
			$request->filter->pkStockItemId = $params['stock_id'];
			$request->filter->IsSetpkStockItemId = true;
		}
		
		if (isset($params['sku']))
		{
			$request->filter->SKU = $params['sku'];
			$request->filter->IsSetSKU = true;
		}
		
		if (isset($params['barcode']))
		{
			$request->filter->BarcodeNumber = $params['barcode'];
			$request->filter->IsSetBarcodeNumber = true;
		}
		
		if (isset($params['title']))
		{
			$request->filter->ItemTitle = $params['title'];
			$request->filter->IsSetItemTitle = true;
		}
		
	    try 
	    {
	    	$response = $this->call_service('InventoryClient', 'GetStockItem', $request);
	    } 
	    catch (Exception $e) 
	    {
		    return new LinnLive_response($e->getMessage(), LinnLive_response::FAILED);
	    }
	    
	    return new LinnLive_response($response->GetStockItemResult->StockItems->StockItem);
    }
    
    public function update($params = array())
    {
	    
    }
    
    
    private function update_stock_level($params = array())
    {
    	$this->require_params(array('stock_id', 'location', 'level'), $params);
    	
	    $request = new ChangeStockLevel();
	    $request->pkStockItemId = new guid($params['stock_id']);
	    $request->UpdateSource = 'API';
	    
	    $level = new StockItemLevel();
	    $level->Location = $params['location'];
	    $level->Level = $params['level'];
	    $level->IsSetLevel = true;
	    
	    $request->stocklevel = $level;
	    
	    try 
	    {
	    	$response = $this->call_service('InventoryClient', 'ChangeStockLevel', $request);
	    } 
	    catch (Exception $e) 
	    {
		    return new LinnLive_response(false, $e->getMessage(), LinnLive_response::FAILED);
	    }
    		
    	return new LinnLive_response($response->ChangeStockLevelResult);
    }
}