<?php

require_once(dirname(__FILE__).'/../stock.php');

$linn = new LinnLive_stock();
$linn->initialize(array('api_key' => ''));

$update = $linn->update_stock_item(array(
	'stock_id' => '094ecf55-1fe8-4e37-8289-f4772b0e96e9', // Stock item id as defined by LinnLive (i.e not the SKU - but you should be able to map it from the inventory dump)
	'item' => array(
		'price' => '25.02'
	)
));

var_dump($update->status());
