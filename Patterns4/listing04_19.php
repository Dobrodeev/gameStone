<?php

require_once "listing04_18.php";

// Листинг 04.19

$p = new ShopProduct();
print $p->calculateTax(100) . "<br />\n";
print $p->generateId() . "<br />\n";

?>
