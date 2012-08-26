<?php

require_once(dirname(__FILE__).'/../stock.php');

$linn = new LinnLive_Stock();
$linn->initialize(array('api_key' => ''));
$stock = $linn->get_stock();

var_dump($stock->data());