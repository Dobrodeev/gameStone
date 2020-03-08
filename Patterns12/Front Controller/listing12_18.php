<?php

require_once('listing12_14.php');

// Листинг 12.18

class DefaultCommand extends Command
{
  public function doExecute(Request $request)
  {
    $request->addFeedback("Добро пожаловать в Woo!");
    include(__DIR__ . "/main.php");
  }
}

?>
