<?php

require_once "listing03_10.php";

// Листинг 03.11

$product1 = new ShopProduct();

$product1->title             = "Собачье сердце";
$product1->producerMainName  = "Булгаков";
$product1->producerFirstName = "Михаил";
$product1->price             = 5.99;

print "Автор: {$product1->getProducer()}\n";


?>
