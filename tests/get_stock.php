<?php

require_once(dirname(__FILE__).'/../linnlive.php');

$linn = new LinnLive();
$linn->initialize(array('api_key' => ''));
var_dump($linn->get_stock());