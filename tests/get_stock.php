<?php

require_once(dirname(__FILE__).'/../stock.php');

$linn = new LinnLive_stock();
$linn->initialize(array('api_key' => ''));
$page = 1;
echo "Getting page $page\r\n";
$stock = $linn->get(array(
	'page' => $page++
));

while (sizeof($stock->data()))
{
	echo "Getting page $page\r\n";
	$stock = $linn->get(array(
		'page' => $page++
	));
}