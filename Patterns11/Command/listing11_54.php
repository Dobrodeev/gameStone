<?php

// Листинг 11.54

class UnitAcquisition
{
  function getUnits(int $x, int $y): array
  {
    // 1. Найти координаты x и y в локальных данных и
    //    получить список идентификаторов боевых единиц
    // 2. Обратиться к источнику и получить
    //    полноценные сведения о боевых единицах
    // А пока что подставим какие-нибудь фиктивные сведения о них
    $army = new Army();
    $army->addUnit(new Archer());
    $found = [
      new Cavalry(),
      //null,
      new NullUnit(),
      new LaserCannonUnit(),
      $army
    ];
    return $found;
  }
}

?>
