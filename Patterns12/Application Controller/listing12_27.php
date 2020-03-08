<?php

// Листинг 12.27

// Класс HttpRequest

  public function forward(string $path)
  {
    header("Location: {$path}");
    exit;
  }

?>
