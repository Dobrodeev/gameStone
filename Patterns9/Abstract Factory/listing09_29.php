<?php

require_once('listing09_28.php');

// Листинг 09.29

class BloggsCommsManager extends CommsManager
{
  public function getHeaderText(): string
  {
    return "BloggsCal верхний колонтитул \n";
  }

  public function make(int $flag_int): Encoder
  {
    switch ($flag_int) {
      case self::APPT:
        return new BloggsApptEncoder();
      case self::CONTACT:
        return new BloggsContactEncoder();
      case self::TTD:
        return new BloggsTtdEncoder();
    }
  }

  public function getFooterText(): string
  {
    return "BloggsCal нижний колонтитул \n";
  }
}
?>
