<?php

// Листинг 12.28

// Класс CliRequest

  public function forward(string $path)
  {
    // Добавить новый путь к концу списка аргументов,
    // где преимущество получает последний аргумент
    $_SERVER['argv'][] = "path:{$path}";
    Registry::reset();
    Controller::run();
  }

?>
