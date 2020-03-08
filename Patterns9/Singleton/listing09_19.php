<?php

// Листинг 09.19

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

  public function getHeaderText(): string
  {
    switch ($this->mode) {
      case (self::MEGA):
        return "MegaCal верхний колонтитул \n";
      default:
        return "BloggsCal верхний колонтитул \n";
    }
  }
}


?>
