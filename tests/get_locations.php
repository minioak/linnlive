<?php

require_once(dirname(__FILE__).'/../locations.php');

$linn = new LinnLive_locations();
$linn->initialize(array('api_key' => ''));
$locations = $linn->get();

var_dump($locations->data());