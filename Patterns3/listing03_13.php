<?php

require_once "listing03_12.php";

// Листинг 03.13

$product1 = new ShopProduct(
     "Собачье сердце",
     "Михаил",
     "Булгаков",
      5.99
);

print "Автор: {$product1->getProducer()}\n";


?>
