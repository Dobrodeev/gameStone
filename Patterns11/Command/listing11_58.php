<?php

require_once('listing11_39.php');

// Листинг 11.58

class NullUnit extends Unit
{
  public function bombardStrength(): int
  {
    return 0;
  }

  public function getHealth(): int
  {
    return 0;
  }

  public function getDepth(): int {
    return 0;
  }
}

?>
