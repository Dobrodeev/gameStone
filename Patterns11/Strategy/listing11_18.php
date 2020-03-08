<?php

require_once('listing11_16.php');

// Листинг 11.18

class MatchMarker extends Marker
{
  public function mark(string $response): bool
  {
    return ($this->test == $response);
  }
}


?>
