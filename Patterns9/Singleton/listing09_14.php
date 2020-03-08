<?php

require_once('listing09_13.php');

// Листинг 09.14

class BloggsApptEncoder extends ApptEncoder
{
  public function encode(): string
  {
    return "Данные о встрече закодированы в формате BloggsCal \n";
  }
}


?>
