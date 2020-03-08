<?php

require_once "listing04_10.php";

// Листинг 04.11

$p = new ShopProduct("Нежное мыло", "",
                     "Ванная Боба", 1.33);
print $p->calculateTax(100) . "\n";


?>
