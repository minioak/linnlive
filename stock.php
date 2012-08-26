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