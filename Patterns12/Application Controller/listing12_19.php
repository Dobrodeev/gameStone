<?php

// Листинг 12.19

// Класс Controller
Class Controller {

  private function __construct()
  {
    $this->reg = Registry::instance();
  }

  public function handleRequest()
  {
    $request = $this->reg->getRequest();
    $controller = new AppController();
    $cmd = $controller->getCommand($request);
    $cmd->execute($request);
    $view = $controller->getView($request);
    $view->render($request);
  }

}

?>
