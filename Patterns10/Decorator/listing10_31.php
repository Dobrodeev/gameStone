<?php

require_once('listing10_29.php');

// Листинг 10.31

abstract class DecorateProcess extends ProcessRequest
{
  protected $processrequest;

  public function __construct(ProcessRequest $pr)
  {
    $this->processrequest = $pr;
  }
}

?>
