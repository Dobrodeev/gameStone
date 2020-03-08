<?php

// Листинг 12.11

class ApplicationHelper
{
  private $config = __DIR__ . "woo_options.ini";
  private $reg;

  public function __construct()
  {
    $this->reg = Registry::instance();
  }

  public function init()
  {
    $this->setupOptions();
    if (isset($_SERVER['REQUEST_METHOD'])) {
      $request = new HttpRequest();
    } else {
      $request = new CliRequest();
   }
    $this->reg->setRequest($request);
  }

  private function setupOptions()
  {
    if (! file_exists($this->config)) {
      throw new AppException("Файл конфигурации не найден!");
    }
    $options = parse_ini_file($this->config, true);
    $conf = new Conf($options['config']);
    $this->reg->setConf($conf);
    $commands = new Conf($options['commands']);
    $this->reg->setCommands($commands);
  }
}

?>
