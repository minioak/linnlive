<?php
class GetStockItem {
  public $Token; // string
  public $filter; // StockItemFilter
}

class StockItemFilter {
  public $pkStockItemId; // guid
  public $IsSetpkStockItemId = false; // boolean
  public $EntriesPerPage; // int
  public $PageNumber; // int
  public $SKU; // string
  public $IsSetSKU = false; // boolean
  public $BarcodeNumber; // string
  public $IsSetBarcodeNumber = false; // boolean
  public $ItemTitle; // string
  public $IsSetItemTitle = false; // boolean
  
  public function __construct() 
  {
	  $this->pkStockItemId = new guid();
  }
}

class GetStockItemResponse {
  public $MorePages; // boolean
  public $StockItems; // ArrayOfStockItem
}

class GenericResponse {
  public $Error; // string
  public $ErrorNum; // int
  public $IsError; // boolean
}

class StockItem {
  public $pkStockItemId; // guid
  public $ItemTitle; // string
  public $IsSetItemTitle; // boolean
  public $SKU; // string
  public $RetailPrice; // double
  public $IsSetRetailPrice; // boolean
  public $PurchasePrice; // double
  public $IsSetPurchasePrice; // boolean
  public $BarcodeNumber; // string
  public $IsSetBarcodeNumber; // boolean
  public $Category; // string
  public $IsSetCategory; // boolean
  public $ItemDescription; // string
  public $IsSetItemDescription; // boolean
  public $Weight; // double
  public $IsSetWeight; // boolean
  public $Depth; // double
  public $IsSetDepth; // boolean
  public $Height; // double
  public $IsSetHeight; // boolean
  public $Width; // double
  public $IsSetWidth; // boolean
  public $TaxRate; // double
  public $IsSetTaxRate; // boolean
  public $VariationsGroupName; // string
  public $IsSetVariationsGroupName; // boolean
  public $PostalServiceName; // string
  public $IsSetPostalServiceName; // boolean
  public $PackageGroup; // string
  public $IsSetPackageGroup; // boolean
  public $Suppliers; // ArrayOfStockItemSupplier
  public $ExtendedProperties; // ArrayOfStockItemExtendedProperty
  public $Levels; // ArrayOfStockItemLevel
  public $ListingPrices; // ArrayOfStockItemListingPrice
  public $ListingTitles; // ArrayOfStockItemListingTitle
  public $ListingDescriptions; // ArrayOfStockItemListingDescription
  public $Locations; // ArrayOfStockItemLocation
  public $Images; // ArrayOfStockItemImage
  public $Composition; // ArrayOfStockItemComposite
  public $LinkedTitles; // ArrayOfStockItemLinkedTitle
  public $MappedChannelSKUs; // ArrayOfStockItemMapping
}

class StockItemSupplier {
  public $fkStockItemId; // guid
  public $fkSupplierId; // guid
  public $IsDefault; // boolean
  public $SupplierName; // string
  public $SupplierCode; // string
  public $IsSetSupplierCode; // boolean
  public $SupplierCode2; // string
  public $IsSetSupplierCode2; // boolean
  public $SupplierBarcode; // string
  public $IsSetSupplierBarcode; // boolean
  public $LeadTime; // int
  public $IsSetLeadTime; // boolean
  public $KnownPurchasePrice; // double
  public $IsSetKnownPurchasePrice; // boolean
  public $AvgPurchasePrice; // double
  public $IsSetAvgPurchasePrice; // boolean
  public $AvgLeadTime; // double
  public $IsSetAvgLeadTime; // boolean
  public $MaxLeadTime; // double
  public $IsSetMaxLeadTime; // boolean
  public $MinOrder; // double
  public $IsSetMinOrder; // boolean
  public $OnHand; // double
  public $IsSetOnHand; // boolean
  public $MinPurchasePrice; // double
  public $IsSetMinPurchasePrice; // boolean
  public $MaxPurchasePrice; // double
  public $IsSetMaxPurchasePrice; // boolean
  public $AvgPurchaseQty; // double
  public $IsSetAvgPurchaseQty; // boolean
}

class StockItemExtendedProperty {
  public $PropertyName; // string
  public $PropertyValue; // string
  public $PropertyType; // string
}

class StockItemLevel {
  public $Location; // string
  public $Level; // int
  public $IsSetLevel; // boolean
  public $MinimumLevel; // int
  public $IsSetMinimumLevel; // boolean
  public $StockValue; // double
  public $IsSetStockValue; // boolean
  public $InOrderBook; // int
  public $OnOrder; // int
}

class StockItemListingPrice {
  public $SalePrice; // double
}

class StockItemListing {
  public $Source; // string
  public $SubSource; // string
}

class StockItemListingDescription {
  public $Description; // string
}

class StockItemListingTitle {
  public $Title; // string
}

class StockItemLocation {
  public $LocationID; // guid
  public $LocationName; // string
  public $BinRack; // string
}

class StockItemImage {
  public $ImageID; // guid
  public $FileHash; // string
  public $IsMain; // boolean
  public $SortOrder; // int
}

class StockItemComposite {
  public $LinkStockItemID; // guid
  public $SKU; // string
  public $Title; // string
  public $Quantity; // int
}

class StockItemLinkedTitle {
  public $StockID; // guid
  public $SKU; // string
  public $Title; // string
  public $Source; // string
}

class StockItemMapping {
  public $ChannelSKU; // string
  public $Source; // string
  public $SubSource; // string
}

class SaveStockItem {
  public $Token; // string
  public $item; // StockItem
}

class SaveStockItemResponse {
  public $SaveStockItemResult; // GetStockItemResponse
}

class UpdateStockItemExtendedProperty {
  public $Token; // string
  public $pkStockItemid; // guid
  public $ExtendedProperty; // StockItemExtendedProperty
  public $Delete; // boolean
}

class UpdateStockItemExtendedPropertyResponse {
  public $UpdateStockItemExtendedPropertyResult; // GenericResponse
}

class UpdateStockItemListingPrice {
  public $Token; // string
  public $pkStockItemid; // guid
  public $channelPrice; // StockItemListingPrice
  public $Delete; // boolean
}

class UpdateStockItemListingPriceResponse {
  public $UpdateStockItemListingPriceResult; // GenericResponse
}

class UpdateStockItemListingTitle {
  public $Token; // string
  public $pkStockItemid; // guid
  public $channelTitle; // StockItemListingTitle
  public $Delete; // boolean
}

class UpdateStockItemListingTitleResponse {
  public $UpdateStockItemListingTitleResult; // GenericResponse
}

class UpdateStockItemListingDescription {
  public $Token; // string
  public $pkStockItemid; // guid
  public $channelDesc; // StockItemListingDescription
  public $Delete; // boolean
}

class UpdateStockItemListingDescriptionResponse {
  public $UpdateStockItemListingDescriptionResult; // GenericResponse
}

class DeleteStockItem {
  public $Token; // string
  public $pkStockItemId; // guid
}

class DeleteStockItemResponse {
  public $DeleteStockItemResult; // GenericResponse
}

class GetImage {
  public $Token; // string
  public $ImageID; // guid
  public $thumbnail; // boolean
}

class GetImageResponse {
  public $GetImageResult; // GenericTypedResponseOfArrayOfByte
}

class GenericTypedResponseOfArrayOfByte {
  public $DataObj; // base64Binary
}

class GetImageURL {
  public $Token; // string
  public $ImageID; // guid
  public $thumbnail; // boolean
}

class GetImageURLResponse {
  public $GetImageURLResult; // GenericTypedResponseOfString
}

class GenericTypedResponseOfString {
  public $DataObj; // string
}

class StockItemImageUpload {
  public $Token; // string
  public $pkStockItemId; // guid
  public $image; // base64Binary
  public $sortOrder; // int
}

class StockItemImageUploadResponse {
  public $StockItemImageUploadResult; // GenericTypedResponseOfStockItemImage
}

class GenericTypedResponseOfStockItemImage {
  public $DataObj; // StockItemImage
}

class StockItemImageDelete {
  public $Token; // string
  public $pkStockItemId; // guid
  public $ImageID; // guid
}

class StockItemImageDeleteResponse {
  public $StockItemImageDeleteResult; // GenericResponse
}

class MarkPrimaryImage {
  public $Token; // string
  public $pkStockItemId; // guid
  public $image; // StockItemImage
}

class MarkPrimaryImageResponse {
  public $MarkPrimaryImageResult; // GenericResponse
}

class UpdateStockItemComposite {
  public $Token; // string
  public $pkStockItemId; // guid
  public $composite; // StockItemComposite
  public $Delete; // boolean
}

class UpdateStockItemCompositeResponse {
  public $UpdateStockItemCompositeResult; // GenericResponse
}

class UpdateStockItemSupplier {
  public $Token; // string
  public $pkStockItemId; // guid
  public $supplier; // StockItemSupplier
  public $Delete; // boolean
}

class UpdateStockItemSupplierResponse {
  public $UpdateStockItemSupplierResult; // GenericResponse
}

class UpdateStockItemLocation {
  public $Token; // string
  public $pkStockItemId; // guid
  public $location; // StockItemLocation
  public $Delete; // boolean
}

class UpdateStockItemLocationResponse {
  public $UpdateStockItemLocationResult; // GenericResponse
}

class ChangeStockLevel {
  public $Token; // string
  public $pkStockItemId; // guid
  public $stocklevel; // StockItemLevel
  public $UpdateSource; // string
}

class ChangeStockLevelResponse {
  public $ChangeStockLevelResult; // GenericResponse
}

class UpdateStockItemMapping {
  public $Token; // string
  public $pkStockItemId; // guid
  public $mapping; // StockItemMapping
  public $Delete; // boolean
}

class UpdateStockItemMappingResponse {
  public $UpdateStockItemMappingResult; // GenericResponse
}

class Get_OpenStockCount {
  public $Token; // string
}

class Get_OpenStockCountResponse {
  public $Get_OpenStockCountResult; // GetOpenStockCountResponse
}

class GetOpenStockCountResponse {
  public $StockCountDate; // dateTime
  public $pkStockCountId; // guid
}

class StockLevelAddDeduct {
  public $Token; // string
  public $SKUorBarcode; // string
  public $diff; // int
  public $updateSource; // string
  public $pkLocationId; // guid
}

class StockLevelAddDeductResponse {
  public $StockLevelAddDeductResult; // StockCountItemResponse
}

class StockCountItemResponse {
  public $SKU; // string
  public $Count; // int
  public $Level; // int
  public $ItemTitle; // string
  public $BinRack; // string
}

class AddStockCount {
  public $Token; // string
  public $barcode; // string
  public $pkStockCountId; // guid
  public $quantity; // int
}

class AddStockCountResponse {
  public $AddStockCountResult; // StockCountItemResponse
}

class guid {

  protected $value;
  
  public function __construct($value = false)
  {
	  $this->value = $value;
  }
  
  public function __toString()
  {
  	$s = strtoupper(md5(uniqid(rand(),true))); 
	$guidText = 
	    substr($s,0,8) . '-' . 
	    substr($s,8,4) . '-' . 
	    substr($s,12,4). '-' . 
	    substr($s,16,4). '-' . 
	    substr($s,20); 
	return $this->value ? $this->value : $guidText;
  }
}


/* ***************************************************************
// LinnLive - Inventory Management 
// Copyright (c) 2012 John Mitchell - http://www.minioak.com
// Generated from http://api.linnlive.com/inventory.asmx?wsdl
// 
// Version: 1.0.0 (1/8/2012)
// 
// Dual licensed under the MIT and GPL licenses:
// http://www.opensource.org/licenses/mit-license.php
// http://www.gnu.org/licenses/gpl.html
// ***************************************************************/

class InventoryClient extends SoapClient {

  private static $classmap = array(
                                    'GetStockItem' => 'GetStockItem',
                                    'StockItemFilter' => 'StockItemFilter',
                                    'GetStockItemResponse' => 'GetStockItemResponse',
                                    'GenericResponse' => 'GenericResponse',
                                    'StockItem' => 'StockItem',
                                    'StockItemSupplier' => 'StockItemSupplier',
                                    'StockItemExtendedProperty' => 'StockItemExtendedProperty',
                                    'StockItemLevel' => 'StockItemLevel',
                                    'StockItemListingPrice' => 'StockItemListingPrice',
                                    'StockItemListing' => 'StockItemListing',
                                    'StockItemListingDescription' => 'StockItemListingDescription',
                                    'StockItemListingTitle' => 'StockItemListingTitle',
                                    'StockItemLocation' => 'StockItemLocation',
                                    'StockItemImage' => 'StockItemImage',
                                    'StockItemComposite' => 'StockItemComposite',
                                    'StockItemLinkedTitle' => 'StockItemLinkedTitle',
                                    'StockItemMapping' => 'StockItemMapping',
                                    'SaveStockItem' => 'SaveStockItem',
                                    'SaveStockItemResponse' => 'SaveStockItemResponse',
                                    'UpdateStockItemExtendedProperty' => 'UpdateStockItemExtendedProperty',
                                    'UpdateStockItemExtendedPropertyResponse' => 'UpdateStockItemExtendedPropertyResponse',
                                    'UpdateStockItemListingPrice' => 'UpdateStockItemListingPrice',
                                    'UpdateStockItemListingPriceResponse' => 'UpdateStockItemListingPriceResponse',
                                    'UpdateStockItemListingTitle' => 'UpdateStockItemListingTitle',
                                    'UpdateStockItemListingTitleResponse' => 'UpdateStockItemListingTitleResponse',
                                    'UpdateStockItemListingDescription' => 'UpdateStockItemListingDescription',
                                    'UpdateStockItemListingDescriptionResponse' => 'UpdateStockItemListingDescriptionResponse',
                                    'DeleteStockItem' => 'DeleteStockItem',
                                    'DeleteStockItemResponse' => 'DeleteStockItemResponse',
                                    'GetImage' => 'GetImage',
                                    'GetImageResponse' => 'GetImageResponse',
                                    'GenericTypedResponseOfArrayOfByte' => 'GenericTypedResponseOfArrayOfByte',
                                    'GetImageURL' => 'GetImageURL',
                                    'GetImageURLResponse' => 'GetImageURLResponse',
                                    'GenericTypedResponseOfString' => 'GenericTypedResponseOfString',
                                    'StockItemImageUpload' => 'StockItemImageUpload',
                                    'StockItemImageUploadResponse' => 'StockItemImageUploadResponse',
                                    'GenericTypedResponseOfStockItemImage' => 'GenericTypedResponseOfStockItemImage',
                                    'StockItemImageDelete' => 'StockItemImageDelete',
                                    'StockItemImageDeleteResponse' => 'StockItemImageDeleteResponse',
                                    'MarkPrimaryImage' => 'MarkPrimaryImage',
                                    'MarkPrimaryImageResponse' => 'MarkPrimaryImageResponse',
                                    'UpdateStockItemComposite' => 'UpdateStockItemComposite',
                                    'UpdateStockItemCompositeResponse' => 'UpdateStockItemCompositeResponse',
                                    'UpdateStockItemSupplier' => 'UpdateStockItemSupplier',
                                    'UpdateStockItemSupplierResponse' => 'UpdateStockItemSupplierResponse',
                                    'UpdateStockItemLocation' => 'UpdateStockItemLocation',
                                    'UpdateStockItemLocationResponse' => 'UpdateStockItemLocationResponse',
                                    'ChangeStockLevel' => 'ChangeStockLevel',
                                    'ChangeStockLevelResponse' => 'ChangeStockLevelResponse',
                                    'UpdateStockItemMapping' => 'UpdateStockItemMapping',
                                    'UpdateStockItemMappingResponse' => 'UpdateStockItemMappingResponse',
                                    'Get_OpenStockCount' => 'Get_OpenStockCount',
                                    'Get_OpenStockCountResponse' => 'Get_OpenStockCountResponse',
                                    'GetOpenStockCountResponse' => 'GetOpenStockCountResponse',
                                    'StockLevelAddDeduct' => 'StockLevelAddDeduct',
                                    'StockLevelAddDeductResponse' => 'StockLevelAddDeductResponse',
                                    'StockCountItemResponse' => 'StockCountItemResponse',
                                    'AddStockCount' => 'AddStockCount',
                                    'AddStockCountResponse' => 'AddStockCountResponse'
                                   );

  public function __construct($wsdl = "http://api.linnlive.com/Inventory.asmx?wsdl", $options = array()) {
    $options['classmap'] = self::$classmap;
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param GetStockItem $parameters
   * @return GetStockItemResponse
   */
  public function GetStockItem(GetStockItem $parameters) {
    return $this->__soapCall('GetStockItem', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param SaveStockItem $parameters
   * @return SaveStockItemResponse
   */
  public function SaveStockItem(SaveStockItem $parameters) {
    return $this->__soapCall('SaveStockItem', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param UpdateStockItemExtendedProperty $parameters
   * @return UpdateStockItemExtendedPropertyResponse
   */
  public function UpdateStockItemExtendedProperty(UpdateStockItemExtendedProperty $parameters) {
    return $this->__soapCall('UpdateStockItemExtendedProperty', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param UpdateStockItemListingPrice $parameters
   * @return UpdateStockItemListingPriceResponse
   */
  public function UpdateStockItemListingPrice(UpdateStockItemListingPrice $parameters) {
    return $this->__soapCall('UpdateStockItemListingPrice', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param UpdateStockItemListingTitle $parameters
   * @return UpdateStockItemListingTitleResponse
   */
  public function UpdateStockItemListingTitle(UpdateStockItemListingTitle $parameters) {
    return $this->__soapCall('UpdateStockItemListingTitle', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param UpdateStockItemListingDescription $parameters
   * @return UpdateStockItemListingDescriptionResponse
   */
  public function UpdateStockItemListingDescription(UpdateStockItemListingDescription $parameters) {
    return $this->__soapCall('UpdateStockItemListingDescription', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param DeleteStockItem $parameters
   * @return DeleteStockItemResponse
   */
  public function DeleteStockItem(DeleteStockItem $parameters) {
    return $this->__soapCall('DeleteStockItem', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetImage $parameters
   * @return GetImageResponse
   */
  public function GetImage(GetImage $parameters) {
    return $this->__soapCall('GetImage', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetImageURL $parameters
   * @return GetImageURLResponse
   */
  public function GetImageURL(GetImageURL $parameters) {
    return $this->__soapCall('GetImageURL', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param StockItemImageUpload $parameters
   * @return StockItemImageUploadResponse
   */
  public function StockItemImageUpload(StockItemImageUpload $parameters) {
    return $this->__soapCall('StockItemImageUpload', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param StockItemImageDelete $parameters
   * @return StockItemImageDeleteResponse
   */
  public function StockItemImageDelete(StockItemImageDelete $parameters) {
    return $this->__soapCall('StockItemImageDelete', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param MarkPrimaryImage $parameters
   * @return MarkPrimaryImageResponse
   */
  public function MarkPrimaryImage(MarkPrimaryImage $parameters) {
    return $this->__soapCall('MarkPrimaryImage', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param UpdateStockItemComposite $parameters
   * @return UpdateStockItemCompositeResponse
   */
  public function UpdateStockItemComposite(UpdateStockItemComposite $parameters) {
    return $this->__soapCall('UpdateStockItemComposite', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param UpdateStockItemSupplier $parameters
   * @return UpdateStockItemSupplierResponse
   */
  public function UpdateStockItemSupplier(UpdateStockItemSupplier $parameters) {
    return $this->__soapCall('UpdateStockItemSupplier', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param UpdateStockItemLocation $parameters
   * @return UpdateStockItemLocationResponse
   */
  public function UpdateStockItemLocation(UpdateStockItemLocation $parameters) {
    return $this->__soapCall('UpdateStockItemLocation', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param ChangeStockLevel $parameters
   * @return ChangeStockLevelResponse
   */
  public function ChangeStockLevel(ChangeStockLevel $parameters) {
    return $this->__soapCall('ChangeStockLevel', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param UpdateStockItemMapping $parameters
   * @return UpdateStockItemMappingResponse
   */
  public function UpdateStockItemMapping(UpdateStockItemMapping $parameters) {
    return $this->__soapCall('UpdateStockItemMapping', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param Get_OpenStockCount $parameters
   * @return Get_OpenStockCountResponse
   */
  public function Get_OpenStockCount(Get_OpenStockCount $parameters) {
    return $this->__soapCall('Get_OpenStockCount', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param StockLevelAddDeduct $parameters
   * @return StockLevelAddDeductResponse
   */
  public function StockLevelAddDeduct(StockLevelAddDeduct $parameters) {
    return $this->__soapCall('StockLevelAddDeduct', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param AddStockCount $parameters
   * @return AddStockCountResponse
   */
  public function AddStockCount(AddStockCount $parameters) {
    return $this->__soapCall('AddStockCount', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/inventory',
            'soapaction' => ''
           )
      );
  }

}