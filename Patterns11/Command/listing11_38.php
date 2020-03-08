<?php

require_once('listing11_37.php');

// Листинг 11.38

abstract class CompositeUnit extends Unit
{
  // ...
  public function textDump($num = 0): string
  {
    $txtout = parent::textDump($num);
    foreach ($this->units as $unit) {
      $txtout .= $unit->textDump($num + 1);
    }
    return $txtout;
  }
}

?>
