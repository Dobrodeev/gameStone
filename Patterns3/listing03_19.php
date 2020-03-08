<?php

require_once "listing03_12.php";
require_once "listing03_18.php";

// Листинг 03.19

$product1 = new ShopProduct("Собачье сердце",
                             "Михаил", "Булгаков", 5.99);
$writer = new ShopProductWriter();
$writer->write($product1);

?>
