<?php

require_once('listing06_05.php');
require_once('listing06_06.php');

// Листинг 06.09
$file = __DIR__ . "/params.xml";

// Может быть возвращен объект типа XmlParamHandler
// или объект типа TextParamHandler
$test = ParamHandler::getInstance($file);

// Может быть сделан вызов XmlParamHandler::read()
// или вызов TextParamHandler::read()
$test->read();

$test->addParam("newkey1", "newval1");

// Может быть сделан вызов XmlParamHandler::write()
// или вызов TextParamHandler::write()
$test->write();

?>