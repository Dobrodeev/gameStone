<?php

require_once('listing09_20.php');

// Листинг 09.21

class BloggsApptEncoder extends ApptEncoder
{
  public function encode(): string
  {
    return "Данные о встрече закодированы в формате BloggsCal <br />\n";
  }
}


?>