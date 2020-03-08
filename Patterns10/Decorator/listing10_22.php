<?php

require_once('listing10_17.php');

// Листинг 10.22

abstract class TileDecorator extends Tile
{
  protected $tile;

  public function __construct(Tile $tile)
  {
    $this->tile = $tile;
  }
}

?>
