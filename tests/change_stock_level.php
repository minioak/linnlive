<?php

require_once(dirname(__FILE__).'/../linnlive.php');

$linn = new LinnLive();
$linn->initialize(array('api_key' => ''));

$update = $linn->update_stock_level(array(
	'stock_id' => '', // Stock item id as defined by LinnLive (i.e not the SKU - but you should be able to map it from the inventory dump)
	'location' => 'Edinburgh', // Location as defined by LinnLive,
	'level' => 10 // Number of items in stock
));

var_dump($update->data());
