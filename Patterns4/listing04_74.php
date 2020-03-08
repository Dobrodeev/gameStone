<?php

// Листинг 04.74

  public function __unset(string $property)
  {
    $method = "set{$property}";
    if (method_exists($this, $method)) {
      $this->$method(null);
    }
  }

?>