<?php

// Листинг 12.07

  // Класс Registry

  private static $testmode = false;

  // ...

  public static function testMode(bool $mode = true)
  {
    self::$instance = null;
    self::$testmode = $mode;
  }

  public static function instance(): self
  {
    if (is_null(self::$instance)) {
      if (self::$testmode) {
        self::$instance = new MockRegistry();
      } else {
        self::$instance = new self();
      }
    }
    return self::$instance;
  }

?>
