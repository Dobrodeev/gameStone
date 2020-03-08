<?php

// Листинг 12.01

class ApplicationHelper
{
  public function getOptions(): array
  {
    $optionfile = __DIR__ . "/data/woo_options.xml";

    if (! file_exists($optionfile)) {
      throw new AppException("Файл с параметрами не найден");
    }

    $options = simplexml_load_file($optionfile);
    $dsn = (string) $options->dsn;
    // Что с этим теперь делать?
    // ...
  }
}

?>
