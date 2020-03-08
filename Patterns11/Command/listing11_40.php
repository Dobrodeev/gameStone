<?php

require_once('listing11_39.php');


// Листинг 11.40

abstract class CompositeUnit extends Unit
{
  protected $units = array();
  // ...

  public function addUnit(Unit $unit)
  {
    foreach ($this->units as $thisunit) {
      if ($unit === $thisunit) {
        return;
      }
    }


    $unit->setDepth($this->depth+1);
    $this->units[] = $unit;
  }

  public function accept(ArmyVisitor $visitor)
  {
    parent::accept($visitor);
    foreach ($this->units as $thisunit) {
      $thisunit->accept($visitor);
    }
  }
}

?>
