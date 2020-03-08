<?php

require_once('listing10_02.php');
require_once('listing10_01.php');

// Листинг 10.03

$unit1 = new Archer();
$unit2 = new LaserCannonUnit();
$army = new Army();
$army->addUnit($unit1);
$army->addUnit($unit2);
print $army->bombardStrength();

?>
