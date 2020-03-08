<?php

require_once('listing13_08.php');

// Листинг 13.09

$genvencoll = new GenVenueCollection();
$genvencoll->add(new Venue(-1, "Loud and Thumping"));
$genvencoll->add(new Venue(-1, "Eeezy"));
$genvencoll->add(new Venue(-1, "Duck and Badger"));

$gen = $genvencoll->getGenerator();

foreach ($gen as $wrapper) {
  print_r($wrapper);
}

?>

