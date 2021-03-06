<?php

require_once('listing09_25.php');

// Листинг 09.26

class BloggsCommsManager extends CommsManager
{
  public function getHeaderText(): string
  {
    return "BloggsCal верхний колонтитул \n";
  }

  public function getApptEncoder(): ApptEncoder
  {
    return new BloggsApptEncoder();
  }

  public function getTtdEncoder(): TtdEncoder
  {
    return new BloggsTtdEncoder();
  }

  public function getContactEncoder(): ContactEncoder
  {
    return new BloggsContactEncoder();
  }

  public function getFooterText(): string
  {
    return "BloggsCal нижний колонтитул \n";
  }
}

?>
