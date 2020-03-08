<?php

// Листинг 13.34

  private function getRow(int $num)
  {
    // ...
    if (isset($this->raw[$num])) {
      $this->objects[$num] = $this->dofact->createObject(
                             $this->raw[$num]);
      return $this->objects[$num];
    }
  }

?>
