<?php

require_once "listing04_31.php";

// Листинг 04.32

$u = new UtilityService();
print $u->calculateTax(100) . "<br />\n";
print $u->basicTax(100) . "<br />\n";

?>
