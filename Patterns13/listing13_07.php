<?php

// Листинг 13.07

$reg = Registry::instance();

$collection = $reg->getVenueCollection();
$collection->add(new Venue(-1, "Loud and Thumping"));
$collection->add(new Venue(-1, "Eeezy"));
$collection->add(new Venue(-1, "Duck and Badger"));

foreach ($collection as $venue) {
  print $venue->getName() . "\n";
}

?>
