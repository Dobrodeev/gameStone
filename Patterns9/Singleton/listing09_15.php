<?php

require_once('listing09_13.php');

// Листинг 09.15

class MegaApptEncoder extends ApptEncoder
{
  public function encode(): string
  {
    return "Данные о встрече закодированы в формате MegaCal \n";
  }
}

?>
