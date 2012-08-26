 <?php

/* ***************************************************************
// LinnLive Orders
// Copyright (c) 2012 John Mitchell - http://www.minioak.com
// 
// Version: 1.0.0 (1/8/2012)
// 
// Licensed under the MIT license:
// http://www.opensource.org/licenses/mit-license.php
// ***************************************************************/

require_once(dirname(__FILE__).'/linnlive.php');

class LinnLive_orders extends LinnLive_request
{
	public function create($params = array())
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
    
    public function process($params = array())
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
    
}