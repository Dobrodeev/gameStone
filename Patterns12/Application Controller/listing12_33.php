<?php

// Листинг 12.33

abstract class PageController
{
  abstract public function process();

  public function __construct()
  {
    $this->reg = Registry::instance();
  }

  public function init()
  {
    if (isset($_SERVER['REQUEST_METHOD'])) {
      $request = new HttpRequest();
    } else {
      $request = new CliRequest();
    }
    $this->reg->setRequest($request);
  }

  public function forward(string $resource)
  {
    $request = $this->getRequest();
    $request->forward($resource);
  }

  public function render(string $resource, Request $request)
  {
    include($resource);
  }

  public function getRequest()
  {
    return $this->reg->getRequest();
  }
}

?>
