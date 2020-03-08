<?php

// Листинг 18.15

  // Класс Controller

  public function handleRequest()
  {
    $request = ApplicationRegistry::getRequest();
    $app_c = ApplicationRegistry::appController();

    while ($cmd = $app_c->getCommand($request)) {
        $cmd->execute($request);
    }

    $this->invokeView($app_c->getView($request));
  }

?>
