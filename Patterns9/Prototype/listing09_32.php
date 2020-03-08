<?php

require_once('listing09_31.php');

// Листинг 09.32

$factory = new TerrainFactory(
  new EarthSea(),
  new EarthPlains(),
  new EarthForest()
);
print_r($factory->getSea());
print_r($factory->getPlains());
print_r($factory->getForest());


?>