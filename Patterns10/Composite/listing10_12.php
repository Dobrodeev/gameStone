<?php

require_once('listing10_10.php');
require_once('listing10_07.php');
require_once('listing10_11.php');

class LaserCannonUnit extends Unit
{
  public function bombardStrength(): int
  {
    return 44;
  }
}




// Листинг 10.12

// создать армию
$main_army = new Army();

// ввести пару боевых единиц
$main_army->addUnit( new Archer() );
$main_army->addUnit( new LaserCannonUnit() );

// создать еще одну армию
$sub_army = new Army();

// ввести несколько боевых единиц
$sub_army->addUnit( new Archer() );
$sub_army->addUnit( new Archer() );
$sub_army->addUnit( new Archer() );

// добавить вторую армию к первой
$main_army->addUnit( $sub_army );

// Все вычисления выполняются подспудно
print " Атакующая сила: {$main_army->bombardStrength()}\n";

?>
