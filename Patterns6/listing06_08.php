<?php

require_once('listing06_05.php');
require_once('listing06_06.php');

// Листинг 06.08

$test = ParamHandler::getInstance(__DIR__ . "/params.txt");
$test->read(); // прочить в текстовом формате
$params = $test->getAllParams();
print_r($params);

?>