<?php

// Листинг 09.16

class CommsManager
{
  public function getApptEncoder(): ApptEncoder
  {
    return new BloggsApptEncoder();
  }
}

?>
