<?php

// Листинг 18.14

  // Класс Request

  public function init()
  {
    if (isset($_SERVER['REQUEST_METHOD'])) {
      if ($_SERVER['REQUEST_METHOD']) {
        $this->properties = $_REQUEST;
        return;
      }
    }
    foreach ($_SERVER['argv'] as $arg) {
      if (strpos($arg, '=')) {
        list($key, $val) = explode("=", $arg);
        $this->setProperty($key, $val);
      }
    }
  }

?>
