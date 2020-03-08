<?php

// Листинг 12.14

abstract class Command
{
  final public function __construct()
  {
  }

  public function execute(Request $request)
  {
    $this->doExecute($request);
  }
  abstract public function doExecute(Request $request);
}


?>
