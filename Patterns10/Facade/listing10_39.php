<?php

require_once('listing10_38.php');

// Листинг 10.39

$facade = new ProductFacade(__DIR__ . '/test2.txt');
$object = $facade->getProduct("234");
print_r($object);

?>