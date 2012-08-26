<?php

require_once(dirname(__FILE__).'/../stock.php');

$linn = new LinnLive_stock();
$linn->initialize(array('api_key' => ''));
$stock = $linn->get();

var_dump($stock->data());