<?php

require_once "listing03_15.php";

// Листинг 03.16

$settings = simplexml_load_file(__DIR__ . "/listing03_14.xml");
$manager = new AddressManager();
$manager->outputAddresses( (string) $settings->resolvedomains);


?>
