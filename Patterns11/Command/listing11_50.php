<?php

// Листинг 11.50

class Controller
{
  private $context;

  public function __construct()
  {
    $this->context = new CommandContext();
  }

  public function getContext(): CommandContext
  {
    return $this->context;
  }

  public function process()
  {
    $action = $this->context->get('action');
    $action = ( is_null($action) ) ? "default" : $action;
    $cmd = CommandFactory::getCommand($action);
    if (! $cmd->execute($this->context)) {
      // обработать неудачный исход операции
    } else {
      // удачный исход операции: отобразить представление
    }
  }
}

?>
