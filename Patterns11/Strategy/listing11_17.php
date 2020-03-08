<?php

require_once('listing11_16.php');

// Листинг 11.17

class MarkLogicMarker extends Marker
{
  private $engine;

  public function __construct(string $test)
  {
    parent::__construct($test);
    $this->engine = new MarkParse($test);
  }

  public function mark(string $response): bool
  {
    return $this->engine->evaluate($response);
  }
}

?>
