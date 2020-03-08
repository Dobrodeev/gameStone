<?php

// Листинг 09.17

class CommsManager
{
  const BLOGGS = 1;
  const MEGA = 2;
  private $mode;

  public function __construct(int $mode)
  {
    $this->mode = $mode;
  }

  public function getApptEncoder(): ApptEncoder
  {
    switch ($this->mode) {
      case (self::MEGA):
        return new MegaApptEncoder();
      default:
        return new BloggsApptEncoder();
    }
  }
}

?>
