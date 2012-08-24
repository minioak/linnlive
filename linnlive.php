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
		    return new LinnLive_response($e->getMessage(), LinnLive_response::FAILED);
	    }
	    
	    return new LinnLive_response($response->GetStockItemResult->StockItems->StockItem);
    }
    
    public function add_order($params = array())
    {
    	$this->require_params(array(
    		'reference', 
    		'postage_excl_tax', 
    		'postage',
    		'subtotal',
    		'total_discount',
    		'total',
    		'payment_method',
    		'items'), $params);
    		
    	$order = new Order();
    	if (isset($params['name'])) $order->FullName = $params['name'];
    	if (isset($params['email'])) $order->Email = $params['email'];
    	if (isset($params['phone'])) $order->BuyerPhoneNumber = $params['phone'];
    	$order->OrderId = 0;
    	$order->OrderDate = date('c');
    	$order->OrderProcessedDate = $order->OrderDate;
    	$order->PostageCostExTax = $params['postage_excl_tax'];
    	$order->PostageCost = $params['postage'];
    	$order->Subtotal = $params['subtotal'];
    	$order->TotalCost = $params['total'];
    	$order->TotalDiscount = $params['total_discount'];
    	$order->CountryOrStateTaxRate = $this->settings['tax_rate'];
    	$order->BankName = $params['payment_method'];
    	$order->CurrencyCode = $this->settings['currency_code'];
    	$order->ReferenceNumber = $params['reference'];
    	$order->Status = isset($params['status']) ? array_search($params['status'], $this->order_status) : 1;
    	$order->OrderProcessed = true;
    	$order->OrderHoldOrCancel = false;
    	$order->OrderMarker = 0;
    	$order->PostalServiceName = '';
    	$order->PackagingGroup = '';
    	
    	foreach ($params['items'] as $item)
    	{
	    	$order_item = new OrderItem();
	    	
	    	$this->require_params(array('title', 'sku', 'quantity', 'unit_cost', 'tax_included', 'discount', 'tax', 'cost', 'cost_including_tax'), $item);
	    	
	    	$order_item->SKU = $item['sku'];
	    	$order_item->Qty = $item['quantity'];
	    	if (isset($item['title'])) $order_item->ItemTitle = $item['title'];
	    	$order_item->IsCompositeChild = false;
	    	$order_item->UnitCost = $item['unit_cost'];
	    	$order_item->TaxRate = isset($item['tax_rate']) ? $item['tax_rate'] : $this->settings['tax_rate'];
	    	$order_item->TaxCostInclusive = $item['tax_included'];
	    	$order_item->ParentRowId = new guid();
	    	$order_item->CostIncTax = $item['cost_including_tax'];
	    	$order_item->Cost = $item['cost'];
	    	$order_item->LineDiscount = $item['discount'];
	    	$order_item->IsService = false;
	    	$order_item->SalesTax = $item['tax'];
	    	
	    	$order->OrderItems[] = $order_item;
    	}
    	
    	if (isset($params['notes']))
    	{
	    	foreach ($params['notes'] as $note)
	    	{
		    	$order_note = new OrderNotes();
		    	
		    	$this->require_params(array('message', 'username', 'internal'), $note);
		    	
		    	$order_note->Note = $note['message'];
		    	$order_note->Internal = $note['internal'];
		    	$order_note->NoteUserName = $note['username'];
		    	$order_note->NoteEntryDate = date('c');
						    	
		    	$order->OrderNotes[] = $order_note;
	    	}
    	}
    	
    	$request = new AddNewOrder();
    	$request->order = $order;
    	    	
    	try 
	    {
	    	$response = $this->call_service('OrderClient', 'AddNewOrder', $request);
	    } 
	    catch (Exception $e) 
	    {
		    return new LinnLive_response(false, $e->getMessage(), LinnLive_response::FAILED);
	    }
    		
    	return new LinnLive_response($response->AddNewOrderResult);
    }
    
    public function process_order($params = array())
    {
	    $this->require_params(array('order_id', 'username'), $params);
	    
	    $request = new ProcessOrder();
	    
	    $order = new ProcessOrderRequest();
	    $order->OrderIdIsSet = true;
	    $order->OrderId = $params['order_id'];
    	$order->ProcessDateTime = date('c');
    	$order->ProcessedByName = $params['username'];
    	
    	$request->request = $order;
    	
    	try 
	    {
	    	$response = $this->call_service('OrderClient', 'ProcessOrder', $request);
	    } 
	    catch (Exception $e) 
	    {
		    return new LinnLive_response(false, $e->getMessage(), LinnLive_response::FAILED);
	    }
    		
    	return new LinnLive_response($response);
	    
    }
    
    public function update_stock_level($params = array())
    {
    	$this->require_params(array('stock_id', 'location', 'level'), $params);
    	
	    $request = new ChangeStockLevel();
	    $request->pkStockItemId = $params['stock_id'];
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
    		
    	return new LinnLive_response($response);
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
