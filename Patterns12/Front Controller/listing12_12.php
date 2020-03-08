<?php

// Листинг 12.12

class Request {

  // должен быть инициализирован каким-нибудь
  // более развитым компонентом
  public function setRequest(Request $request)
  {
    $this->request = $request;
  }

  public function getRequest(): Request
  {
    if (is_null($this->request)) {
      throw new \Exception("Объект типа Request не задан!");
    }
    return $this->request;
  }

  public function getApplicationHelper(): ApplicationHelper
  {
    if (is_null($this->applicationHelper)) {
      $this->applicationHelper = new ApplicationHelper();
    }
    return $this->applicationHelper;
  }

  public function setConf(Conf $conf)
  {
    $this->conf = $conf;
  }

  public function getConf(): Conf
  {
    if (is_null($this->conf)) {
      $this->conf = new Conf();
    }
    return $this->conf;
  }

  public function setCommands(Conf $commands)
  {
    $this->commands = $commands;
  }

  public function getCommands(): Conf
  {
    return $this->commands;
  }

}
?>

