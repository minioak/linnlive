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
     * update_stock_item function.
     * 
     * @access public
     * @param array $params (default: array($params = array())
     * @return LinnLive_response or array of LinnLive_response
     */
    public function update_stock_item($params = array())
    {
    	$property_map = array(
    		'price' => 'RetailPrice',
    		'title' => 'ItemTitle'
    	);
    	
	    $this->require_one_of(array('stock_id', 'sku', 'barcode'), $params);
	    $this->require_params(array('item'), $params);
	    
	    $request = new SaveStockItem();
	    
	    $stock_item = $this->get(array(
	    	'filter' => $params
	    ));
	    
	    $request->item = $stock_item->rawdata();
	   	    
	    if ($request->item)
	    {
	    	foreach ($params['item'] as $property => $value)
	    	{
		    	if (in_array($property, array_keys($property_map)))
		    	{
		    		$isset = 'IsSet'.$property_map[$property];
		    		$obj_property = $property_map[$property];
			    	$request->item->$obj_property = $value;
			    	$request->item->$isset = true;
		    	}
		    	else
		    	{
			    	throw new Exception("Unsupported property $property was passed");
		    	}
	    	}
	    	
		    try 
		    {
		    	$response = $this->call_service('InventoryClient', 'SaveStockItem', $request);
		    
			    return new LinnLive_response($response->SaveStockItemResult);
		    } 
		    catch (Exception $e) 
		    {
			    return new LinnLive_response(false, $e->getMessage(), LinnLive_response::FAILED);
		    }
	    }
    }
    
    public function update_stock_level($params = array())
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