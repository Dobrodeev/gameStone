<?php

require_once('listing13_42.php');
require_once('listing12_45.php');

// Листинг 13.43

$vuf = new VenueUpdateFactory();
print_r($vuf->newUpdate(new Venue(
        334, "The Happy Hairband")));

?>
