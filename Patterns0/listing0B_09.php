<?php

require_once('listing0B_07.php');

// Листинг Б.09

abstract class CollectionParse extends Parser
{
  protected $parsers = [];

  public function add(Parser $p): Parser
  {
    if (is_null($p)) {
      throw new Exception("Аргумент является null!");
    }

    $this->parsers[]= $p;

    return $p;
  }

  public function term(): bool
  {
    return false;
  }
}


?>
