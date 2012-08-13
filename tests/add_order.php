<?php

require_once(dirname(__FILE__).'/../linnlive.php');

$linn = new LinnLive();
$linn->initialize(array('api_key' => ''));

$order = $linn->add_order(array(
	'reference' => 'SCO123', 
	'postage_excl_tax' => 1.0, 
	'postage' => 1.2,
	'subtotal' => 5.5,
	'total_discount' => 0.0,
	'total' => 6.7,
	'payment_method' => 'Visa',
	'items' => array(
		array(
			'title' => 'R-Truth Extreme Rules',
			'sku' => '0027084952278', 
			'quantity' => 1, 
			'unit_cost' => 7.99,
			'tax_included' => true, 
			'discount' => 0, 
			'tax' => 0, 
			'cost' => 7.99, 
			'cost_including_tax' => 7.99
		)
	)
));

$order_data = $order->data();

$processed_order = $linn->process_order(array(
	'order_id' => $order_data['OrderId'],
	'username' => 'John M'
));

var_dump($processed_order);