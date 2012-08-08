<?php
class ProcessOrder {
  public $Token; // string
  public $request; // ProcessOrderRequest
}

class ProcessOrderRequest {
  public $pkOrderIdIsSet; // boolean
  public $pkOrderId; // guid
  public $OrderIdIsSet; // boolean
  public $OrderId; // int
  public $PostalTrackingNumber; // string
  public $ShippingMethod; // string
  public $Location; // string
  public $ProcessedByName; // string
  public $ProcessDateTimeIdIsSet; // boolean
  public $ProcessDateTime; // dateTime
}

class ProcessOrderResponse {
  public $ProcessOrderResult; // GenericResponse
}

class GetLiteOpenOrders {
  public $Token; // string
  public $page; // int
  public $EntriesPerPage; // int
}

class GetLiteOpenOrdersResponse {
  public $GetLiteOpenOrdersResult; // GetLiteOrdersResponse
}

class GetLiteOrdersResponse {
  public $MorePages; // boolean
  public $Orders; // ArrayOfOrderLite
}

class OrderLite {
  public $pkOrderId; // guid
  public $nOrderId; // int
  public $Total; // double
  public $Source; // string
  public $Subsource; // string
  public $Currency; // string
  public $nStatus; // int
  public $OrderDate; // dateTime
  public $Items; // ArrayOfOrderItemLite
}

class OrderItemLite {
  public $SKU; // string
  public $ItemTitle; // string
  public $Quantity; // int
}

class GetFilteredOrders {
  public $Token; // string
  public $Filter; // GetOrdersFilter
}

class GetOrdersFilter {
  public $OrderDateFromIsSet; // boolean
  public $OrderDateFrom; // dateTime
  public $OrderDateToIsSet; // boolean
  public $OrderDateTo; // dateTime
  public $OrderProcessDateFromIsSet; // boolean
  public $OrderProcessDateFrom; // dateTime
  public $OrderProcessDateToIsSet; // boolean
  public $OrderProcessDateTo; // dateTime
  public $OrderIdIsSet; // boolean
  public $OrderId; // int
  public $pkOrderIdIsSet; // boolean
  public $pkOrderId; // guid
  public $ProcessedIsSet; // boolean
  public $Processed; // boolean
  public $Source; // string
  public $SubSource; // string
  public $Location; // string
  public $OrderFolder; // string
  public $StatusIsSet; // boolean
  public $Status; // int
  public $ExcludeOnHold; // boolean
  public $ExcludeParked; // boolean
  public $EntriesPerPage; // int
  public $PageNumber; // int
}

class GetFilteredOrdersResponse {
  public $GetFilteredOrdersResult; // GetFilteredOrdersResponse
}

class GetFilteredOrdersResult {
  public $MorePages; // boolean
  public $Orders; // ArrayOfOrder
}

class Order {
  public $ShippingAddress; // Address
  public $BillingAddress; // Address
  public $pkOrderId; // guid
  public $FullName; // string
  public $Email; // string
  public $BuyerPhoneNumber; // string
  public $ChannelBuyerName; // string
  public $OrderDate; // dateTime
  public $OrderProcessedDate; // dateTime
  public $PostageCostExTax; // double
  public $PostageCost; // double
  public $TotalCost; // double
  public $Subtotal; // double
  public $TotalDiscount; // double
  public $CountryOrStateTaxRate; // double
  public $BankName; // string
  public $CurrencyCode; // string
  public $OrderId; // int
  public $Status; // int
  public $Source; // string
  public $SubSource; // string
  public $OrderProcessed; // boolean
  public $PostalServiceName; // string
  public $PackagingGroup; // string
  public $ShippingTrackingNumber; // string
  public $ReferenceNumber; // string
  public $ExternalReferenceNumber; // string
  public $OrderHoldOrCancel; // boolean
  public $OrderMarker; // int
  public $OrderItems; // ArrayOfOrderItem
  public $OrderNotes; // ArrayOfOrderNotes
  public $Audit; // ArrayOfOrderAudit
  
  public function __construct() 
  {
	  $this->pkOrderId = new guid();
	  
  }
}

class Address {
  public $Name; // string
  public $Company; // string
  public $Address1; // string
  public $Address2; // string
  public $Address3; // string
  public $Town; // string
  public $Region; // string
  public $PostCode; // string
  public $CountryName; // string
}

class OrderItem {
  public $RowId; // guid
  public $OrderItemNumber; // string
  public $SKU; // string
  public $ItemTitle; // string
  public $ChannelSKU; // string
  public $ChannelItemTitle; // string
  public $Qty; // int
  public $IsCompositeChild; // boolean
  public $ParentRowId; // guid
  public $UnitCost; // double
  public $TaxRate; // double
  public $TaxCostInclusive; // boolean
  public $CostIncTax; // double
  public $Cost; // double
  public $LineDiscount; // double
  public $IsService; // boolean
  public $SalesTax; // double
}

class OrderNotes {
  public $pkOrderNoteId; // guid
  public $Note; // string
  public $Internal; // boolean
  public $NoteUserName; // string
  public $NoteEntryDate; // dateTime
}

class OrderAudit {
  public $HistoryNote; // string
  public $fkOrderHistoryTypeId; // string
  public $DateStamp; // dateTime
  public $Tag; // string
  public $UpdatedBy; // string
}

class AddNewOrder {
  public $Token; // string
  public $order; // Order
}

class AddNewOrderResponse {
  public $AddNewOrderResult; // GenericResponse
}

class UpdateOrder {
  public $Token; // string
  public $order; // Order
}

class UpdateOrderResponse {
  public $UpdateOrderResult; // GetOrderResponse
}

class GetOrderResponse {
  public $Order; // Order
}

class DeleteOrder {
  public $Token; // string
  public $pkOrderId; // guid
}

class DeleteOrderResponse {
  public $DeleteOrderResult; // GenericResponse
}

class AddOrderAudit {
  public $Token; // string
  public $pkOrderId; // guid
  public $audit; // OrderAudit
}

class AddOrderAuditResponse {
  public $AddOrderAuditResult; // GenericResponse
}

/* ***************************************************************
// LinnLive - Order Management 
// Copyright (c) 2012 John Mitchell - http://www.minioak.com
// Generated from http://api.linnlive.com/order.asmx?wsdl
// 
// Version: 1.0.0 (1/8/2012)
// 
// Dual licensed under the MIT and GPL licenses:
// http://www.opensource.org/licenses/mit-license.php
// http://www.gnu.org/licenses/gpl.html
// ***************************************************************/

class OrderClient extends SoapClient {

  private static $classmap = array(
                                    'ProcessOrder' => 'ProcessOrder',
                                    'ProcessOrderRequest' => 'ProcessOrderRequest',
                                    'ProcessOrderResponse' => 'ProcessOrderResponse',
                                    'GenericResponse' => 'GenericResponse',
                                    'GetLiteOpenOrders' => 'GetLiteOpenOrders',
                                    'GetLiteOpenOrdersResponse' => 'GetLiteOpenOrdersResponse',
                                    'GetLiteOrdersResponse' => 'GetLiteOrdersResponse',
                                    'OrderLite' => 'OrderLite',
                                    'OrderItemLite' => 'OrderItemLite',
                                    'GetFilteredOrders' => 'GetFilteredOrders',
                                    'GetOrdersFilter' => 'GetOrdersFilter',
                                    'GetFilteredOrdersResponse' => 'GetFilteredOrdersResponse',
                                    'GetFilteredOrdersResponse' => 'GetFilteredOrdersResponse',
                                    'Order' => 'Order',
                                    'Address' => 'Address',
                                    'OrderItem' => 'OrderItem',
                                    'OrderNotes' => 'OrderNotes',
                                    'OrderAudit' => 'OrderAudit',
                                    'AddNewOrder' => 'AddNewOrder',
                                    'AddNewOrderResponse' => 'AddNewOrderResponse',
                                    'UpdateOrder' => 'UpdateOrder',
                                    'UpdateOrderResponse' => 'UpdateOrderResponse',
                                    'GetOrderResponse' => 'GetOrderResponse',
                                    'DeleteOrder' => 'DeleteOrder',
                                    'DeleteOrderResponse' => 'DeleteOrderResponse',
                                    'AddOrderAudit' => 'AddOrderAudit',
                                    'AddOrderAuditResponse' => 'AddOrderAuditResponse',
                                    'guid' => 'guid',
                                   );

  public function Order($wsdl = "http://api.linnlive.com/order.asmx?wsdl", $options = array()) {
    $options['classmap'] = self::$classmap;
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param ProcessOrder $parameters
   * @return ProcessOrderResponse
   */
  public function ProcessOrder(ProcessOrder $parameters) {
    return $this->__soapCall('ProcessOrder', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/order',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetLiteOpenOrders $parameters
   * @return GetLiteOpenOrdersResponse
   */
  public function GetLiteOpenOrders(GetLiteOpenOrders $parameters) {
    return $this->__soapCall('GetLiteOpenOrders', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/order',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetFilteredOrders $parameters
   * @return GetFilteredOrdersResponse
   */
  public function GetFilteredOrders(GetFilteredOrders $parameters) {
    return $this->__soapCall('GetFilteredOrders', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/order',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param AddNewOrder $parameters
   * @return AddNewOrderResponse
   */
  public function AddNewOrder(AddNewOrder $parameters) {
    return $this->__soapCall('AddNewOrder', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/order',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param UpdateOrder $parameters
   * @return UpdateOrderResponse
   */
  public function UpdateOrder(UpdateOrder $parameters) {
    return $this->__soapCall('UpdateOrder', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/order',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param DeleteOrder $parameters
   * @return DeleteOrderResponse
   */
  public function DeleteOrder(DeleteOrder $parameters) {
    return $this->__soapCall('DeleteOrder', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/order',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param AddOrderAudit $parameters
   * @return AddOrderAuditResponse
   */
  public function AddOrderAudit(AddOrderAudit $parameters) {
    return $this->__soapCall('AddOrderAudit', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/order',
            'soapaction' => ''
           )
      );
  }

}
