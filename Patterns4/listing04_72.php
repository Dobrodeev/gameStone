<?php

// Листинг 04.72

  public function __isset(string $property)
  {
    $method = "get{$property}";
    return (method_exists($this, $method));
  }

?>