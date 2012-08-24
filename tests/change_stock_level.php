<?php

require_once(dirname(__FILE__).'/../linnlive.php');

$linn = new LinnLive();
$linn->initialize(array('api_key' => ''));

$update = $linn->update_stock_level(array(
	'stock_id' => '094ecf55-1fe8-4e37-8289-f4772b0e96e9', // Stock item id as defined by LinnLive (i.e not the SKU - but you should be able to map it from the inventory dump)
	'location' => 'Default', // Location as defined by LinnLive,
	'level' => 10 // Number of items in stock
));

var_dump($update->status());
