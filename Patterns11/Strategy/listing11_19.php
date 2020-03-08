<?php

require_once('listing11_16.php');

// Листинг 11.19

class RegexpMarker extends Marker
{
  public function mark(string $response): bool
  {
    return (preg_match("$this->test", $response) === 1);
  }
}

?>
