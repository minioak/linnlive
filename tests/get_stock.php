<?php

require_once(dirname(__FILE__).'/../linnlive.php');

$linn = new LinnLive();
$linn->initialize(array('api_key' => '35B6E0463971413FB172B4EDA993DCF3'));
var_dump($linn->get_stock());