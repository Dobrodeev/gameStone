<?php

require_once "listing04_13.php";
require_once "listing04_15.php";

// Листинг 04.16

$p = new ShopProduct();
print $p->calculateTax(100) . "<br />\n";

$u = new UtilityService();
print $u->calculateTax(100) . "<br />\n";

?>
