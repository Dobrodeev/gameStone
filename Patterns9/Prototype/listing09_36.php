<?php

// Листинг 09.36

class AppConfig
{
  private static $instance;
  private $commsManager;

  private function __construct()
  {
    // будет выполнено только один раз
    $this->init();
  }

  private function init()
  {
    switch (Settings::$COMMSTYPE) {
      case 'Mega':
        $this->commsManager = new MegaCommsManager();
        break;
      default:
        $this->commsManager = new BloggsCommsManager();
    }
  }

  public static function getInstance(): AppConfig
  {
    if (empty(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getCommsManager(): CommsManager
  {
    return $this->commsManager;
  }
}
?>
