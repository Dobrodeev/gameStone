<?php

require_once('listing06_05.php');
require_once('listing06_06.php');

// Листинг 06.07

$test = ParamHandler::getInstance(__DIR__ . "/params.xml");
$test->addParam("key1", "val1");
$test->addParam("key2", "val2");
$test->addParam("key3", "val3");
$test->write(); // записать параметры в формате XML

?>