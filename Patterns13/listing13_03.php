<?php

require_once('listing13_02.php');
require_once('listing12_05.php');

// Листинг 13.03

$mapper = new VenueMapper();
$venue = $mapper->find(2);
print_r($venue);

?>