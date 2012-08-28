<?php
class GenerateToken {
  public $email; // string
  public $password; // string
}

class GenerateTokenResponse {
  public $GenerateTokenResult; // GenerateNewTokenResponse
}

class GenerateNewTokenResponse {
  public $Token; // string
}

class GenericResponse {
  public $Error; // string
  public $ErrorNum; // int
  public $IsError; // boolean
}

class CheckToken {
  public $Token; // string
}

class CheckTokenResponse {
  public $CheckTokenResult; // GenericResponse
}

class GetCategories {
  public $Token; // string
}

class GetCategoriesResponse {
  public $GetCategoriesResult; // GenericTypedResponseOfArrayOfCategory
}

class GenericTypedResponseOfArrayOfCategory {
  public $DataObj; // ArrayOfCategory
}

class Category {
  public $CategoryId; // guid
  public $CategoryName; // string
}

class AddProductCategory {
  public $Token; // string
  public $CategoryName; // string
}

class AddProductCategoryResponse {
  public $AddProductCategoryResult; // GenericTypedResponseOfGuid
}

class GenericTypedResponseOfGuid {
  public $DataObj; // guid
}

class DeleteProductCategory {
  public $Token; // string
  public $CategoryName; // string
}

class DeleteProductCategoryResponse {
  public $DeleteProductCategoryResult; // GenericResponse
}

class GetPostalServices {
  public $Token; // string
}

class GetPostalServicesResponse {
  public $GetPostalServicesResult; // GenericTypedResponseOfArrayOfPostalService
}

class GenericTypedResponseOfArrayOfPostalService {
  public $DataObj; // ArrayOfPostalService
}

class PostalService {
  public $pkPostalServiceId; // guid
  public $PostalServiceName; // string
  public $PostalServiceTag; // string
  public $ServiceCountry; // string
  public $PostalServiceCode; // string
  public $Vendor; // string
  public $TrackingNumberRequired; // boolean
  public $WeightRequired; // boolean
  public $IgnorePackagingGroup; // boolean
  public $PrintModuleTitle; // string
}

class GetLocations {
  public $Token; // string
}

class GetLocationsResponse {
  public $GetLocationsResult; // GenericTypedResponseOfArrayOfStockItemLocation
}

class GenericTypedResponseOfArrayOfStockItemLocation {
  public $DataObj; // ArrayOfStockItemLocation
}

class StockItemLocation {
  public $LocationID; // guid
  public $LocationName; // string
  public $BinRack; // string
}

class GetSuppliers {
  public $Token; // string
}

class GetSuppliersResponse {
  public $GetSuppliersResult; // GenericTypedResponseOfArrayOfStockItemSupplier
}

class GenericTypedResponseOfArrayOfStockItemSupplier {
  public $DataObj; // ArrayOfStockItemSupplier
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

class GetPackagingGroups {
  public $Token; // string
}

class GetPackagingGroupsResponse {
  public $GetPackagingGroupsResult; // GenericTypedResponseOfArrayOfPackageGroup
}

class GenericTypedResponseOfArrayOfPackageGroup {
  public $DataObj; // ArrayOfPackageGroup
}

class PackageGroup {
  public $PackageCategoryID; // guid
  public $PackageCategory; // string
}

class GetPaymentMethods {
  public $Token; // string
}

class GetPaymentMethodsResponse {
  public $GetPaymentMethodsResult; // GenericTypedResponseOfArrayOfPaymentMethod
}

class GenericTypedResponseOfArrayOfPaymentMethod {
  public $DataObj; // ArrayOfPaymentMethod
}

class PaymentMethod {
  public $PaymentMethodID; // guid
  public $PaymentMethodName; // string
}

class GetAuditTypes {
  public $Token; // string
}

class GetAuditTypesResponse {
  public $GetAuditTypesResult; // GenericTypedResponseOfArrayOfAuditType
}

class GenericTypedResponseOfArrayOfAuditType {
  public $DataObj; // ArrayOfAuditType
}

class AuditType {
  public $Type; // string
  public $Description; // string
}

class GetOrderStatusTypes {
  public $Token; // string
}

class GetOrderStatusTypesResponse {
  public $GetOrderStatusTypesResult; // GenericTypedResponseOfArrayOfOrderStatusType
}

class GenericTypedResponseOfArrayOfOrderStatusType {
  public $DataObj; // ArrayOfOrderStatusType
}

class OrderStatusType {
  public $Status; // int
  public $Description; // string
}

class GetExtendedPropertyTypes {
  public $Token; // string
}

class GetExtendedPropertyTypesResponse {
  public $GetExtendedPropertyTypesResult; // GenericTypedResponseOfArrayOfExtendedPropertyType
}

class GenericTypedResponseOfArrayOfExtendedPropertyType {
  public $DataObj; // ArrayOfExtendedPropertyType
}

class ExtendedPropertyType {
  public $Type; // string
  public $Description; // string
}


/**
 * generic class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class GenericClient extends SoapClient {

  private static $classmap = array(
                                    'GenerateToken' => 'GenerateToken',
                                    'GenerateTokenResponse' => 'GenerateTokenResponse',
                                    'GenerateNewTokenResponse' => 'GenerateNewTokenResponse',
                                    'GenericResponse' => 'GenericResponse',
                                    'CheckToken' => 'CheckToken',
                                    'CheckTokenResponse' => 'CheckTokenResponse',
                                    'GetCategories' => 'GetCategories',
                                    'GetCategoriesResponse' => 'GetCategoriesResponse',
                                    'GenericTypedResponseOfArrayOfCategory' => 'GenericTypedResponseOfArrayOfCategory',
                                    'Category' => 'Category',
                                    'AddProductCategory' => 'AddProductCategory',
                                    'AddProductCategoryResponse' => 'AddProductCategoryResponse',
                                    'GenericTypedResponseOfGuid' => 'GenericTypedResponseOfGuid',
                                    'DeleteProductCategory' => 'DeleteProductCategory',
                                    'DeleteProductCategoryResponse' => 'DeleteProductCategoryResponse',
                                    'GetPostalServices' => 'GetPostalServices',
                                    'GetPostalServicesResponse' => 'GetPostalServicesResponse',
                                    'GenericTypedResponseOfArrayOfPostalService' => 'GenericTypedResponseOfArrayOfPostalService',
                                    'PostalService' => 'PostalService',
                                    'GetLocations' => 'GetLocations',
                                    'GetLocationsResponse' => 'GetLocationsResponse',
                                    'GenericTypedResponseOfArrayOfStockItemLocation' => 'GenericTypedResponseOfArrayOfStockItemLocation',
                                    'StockItemLocation' => 'StockItemLocation',
                                    'GetSuppliers' => 'GetSuppliers',
                                    'GetSuppliersResponse' => 'GetSuppliersResponse',
                                    'GenericTypedResponseOfArrayOfStockItemSupplier' => 'GenericTypedResponseOfArrayOfStockItemSupplier',
                                    'StockItemSupplier' => 'StockItemSupplier',
                                    'GetPackagingGroups' => 'GetPackagingGroups',
                                    'GetPackagingGroupsResponse' => 'GetPackagingGroupsResponse',
                                    'GenericTypedResponseOfArrayOfPackageGroup' => 'GenericTypedResponseOfArrayOfPackageGroup',
                                    'PackageGroup' => 'PackageGroup',
                                    'GetPaymentMethods' => 'GetPaymentMethods',
                                    'GetPaymentMethodsResponse' => 'GetPaymentMethodsResponse',
                                    'GenericTypedResponseOfArrayOfPaymentMethod' => 'GenericTypedResponseOfArrayOfPaymentMethod',
                                    'PaymentMethod' => 'PaymentMethod',
                                    'GetAuditTypes' => 'GetAuditTypes',
                                    'GetAuditTypesResponse' => 'GetAuditTypesResponse',
                                    'GenericTypedResponseOfArrayOfAuditType' => 'GenericTypedResponseOfArrayOfAuditType',
                                    'AuditType' => 'AuditType',
                                    'GetOrderStatusTypes' => 'GetOrderStatusTypes',
                                    'GetOrderStatusTypesResponse' => 'GetOrderStatusTypesResponse',
                                    'GenericTypedResponseOfArrayOfOrderStatusType' => 'GenericTypedResponseOfArrayOfOrderStatusType',
                                    'OrderStatusType' => 'OrderStatusType',
                                    'GetExtendedPropertyTypes' => 'GetExtendedPropertyTypes',
                                    'GetExtendedPropertyTypesResponse' => 'GetExtendedPropertyTypesResponse',
                                    'GenericTypedResponseOfArrayOfExtendedPropertyType' => 'GenericTypedResponseOfArrayOfExtendedPropertyType',
                                    'ExtendedPropertyType' => 'ExtendedPropertyType'
                                   );

  public function GenericClient($wsdl = "http://api.linnlive.com/generic.asmx?wsdl", $options = array()) {
    $options['classmap'] = self::$classmap;
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param GenerateToken $parameters
   * @return GenerateTokenResponse
   */
  public function GenerateToken(GenerateToken $parameters) {
    return $this->__soapCall('GenerateToken', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param CheckToken $parameters
   * @return CheckTokenResponse
   */
  public function CheckToken(CheckToken $parameters) {
    return $this->__soapCall('CheckToken', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetCategories $parameters
   * @return GetCategoriesResponse
   */
  public function GetCategories(GetCategories $parameters) {
    return $this->__soapCall('GetCategories', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param AddProductCategory $parameters
   * @return AddProductCategoryResponse
   */
  public function AddProductCategory(AddProductCategory $parameters) {
    return $this->__soapCall('AddProductCategory', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param DeleteProductCategory $parameters
   * @return DeleteProductCategoryResponse
   */
  public function DeleteProductCategory(DeleteProductCategory $parameters) {
    return $this->__soapCall('DeleteProductCategory', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetPostalServices $parameters
   * @return GetPostalServicesResponse
   */
  public function GetPostalServices(GetPostalServices $parameters) {
    return $this->__soapCall('GetPostalServices', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetLocations $parameters
   * @return GetLocationsResponse
   */
  public function GetLocations(GetLocations $parameters) {
    return $this->__soapCall('GetLocations', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetSuppliers $parameters
   * @return GetSuppliersResponse
   */
  public function GetSuppliers(GetSuppliers $parameters) {
    return $this->__soapCall('GetSuppliers', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetPackagingGroups $parameters
   * @return GetPackagingGroupsResponse
   */
  public function GetPackagingGroups(GetPackagingGroups $parameters) {
    return $this->__soapCall('GetPackagingGroups', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetPaymentMethods $parameters
   * @return GetPaymentMethodsResponse
   */
  public function GetPaymentMethods(GetPaymentMethods $parameters) {
    return $this->__soapCall('GetPaymentMethods', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetAuditTypes $parameters
   * @return GetAuditTypesResponse
   */
  public function GetAuditTypes(GetAuditTypes $parameters) {
    return $this->__soapCall('GetAuditTypes', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetOrderStatusTypes $parameters
   * @return GetOrderStatusTypesResponse
   */
  public function GetOrderStatusTypes(GetOrderStatusTypes $parameters) {
    return $this->__soapCall('GetOrderStatusTypes', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetExtendedPropertyTypes $parameters
   * @return GetExtendedPropertyTypesResponse
   */
  public function GetExtendedPropertyTypes(GetExtendedPropertyTypes $parameters) {
    return $this->__soapCall('GetExtendedPropertyTypes', array($parameters),       array(
            'uri' => 'http://api.linnlive.com/generic',
            'soapaction' => ''
           )
      );
  }

}

?>
