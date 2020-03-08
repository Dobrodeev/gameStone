<?php

// Листинг 12.30

abstract class Command
{
  const CMD_DEFAULT = 0;
  const CMD_OK      = 1;
  const CMD_ERROR   = 2;
  const CMD_INSUFFICIENT_DATA = 3;

  final public function __construct()
  {
  }

  public function execute(Request $request)
  {
    $status = $this->doExecute($request);
    $request->setCmdStatus($status);
  }
  abstract public function doExecute(Request $request): int;
}

?>
