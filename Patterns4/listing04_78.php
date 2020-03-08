<?php

require_once('listing04_77.php');

// Листинг 04.78

$address = new Address("441b Bakers Street");
print "Адрес: {$address->streetaddress}\r\n<br />";

$address = new Address("15", "Albert Mews");
print "Адрес: {$address->streetaddress}\r\n<br />";

$address->streetaddress = "34, West 24th Avenue";
print "Адрес: {$address->streetaddress}\r\n<br />";

?>
