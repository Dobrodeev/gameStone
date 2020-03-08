<?php

require_once('listing09_22.php');

// Листинг 09.23

class BloggsCommsManager extends CommsManager
{
  public function getHeaderText(): string
  {
    return "BloggsCal верхний колонтитул <br />\n";
  }

  public function getApptEncoder(): ApptEncoder
  {
    return new BloggsApptEncoder();
  }

  public function getFooterText(): string
  {
    return "BloggsCal нижний колонтитул <br />\n";
  }
}


?>
