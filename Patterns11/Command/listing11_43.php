<?php

require_once('listing11_39.php');
require_once('listing11_42.php');

require_once('listing11_35.php');
require_once('listing10_09.php');


class LaserCannonUnit extends Unit
{
  public function bombardStrength(): int
  {
    return 44;
  }
}

class Cavalry extends Unit
{
  public function bombardStrength(): int
  {
    return 2;
  }
}


// Листинг 11.43

$main_army = new Army();
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCannonUnit());
$main_army->addUnit(new Cavalry());
$textdump = new TextDumpArmyVisitor();
$main_army->accept($textdump);
print $textdump->getText();


?>
