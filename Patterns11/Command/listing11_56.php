<?php

require_once('listing11_54.php');
require_once('listing11_53.php');
require_once('listing11_35.php');
require_once('listing10_11.php');
require_once('listing11_58.php');

class Cavalry extends Unit
{
  public function bombardStrength(): int
  {
    return 2;
  }
}

class LaserCannonUnit extends Unit
{
  public function bombardStrength(): int
  {
    return 44;
  }
}





// Листинг 11.56

$acquirer = new UnitAcquisition();
$tileforces = new TileForces(4, 2, $acquirer);
$power = $tileforces->firepower();
print "Огневая мощь: {$power}\n";

?>
