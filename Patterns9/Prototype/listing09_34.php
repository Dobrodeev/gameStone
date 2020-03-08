<?php

require_once('listing09_31.php');


// Листинг 09.34

$factory = new TerrainFactory(
    new EarthSea(-1),
    new EarthPlains(),
    new EarthForest()
);

?>
