<?php

require_once('listing04_89.php');

// Листинг 04.90

$logger = function($product) {
    print " Записываем ({$product->name})\r\n<br />";
};

$processor = new ProcessSale();
$processor->registerCallback($logger);

$processor->sale(new Product("Туфли", 6));
print "\r\n<br />";
$processor->sale(new Product("Кофе", 6));

?>
