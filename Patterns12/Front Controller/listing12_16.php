<?php

require_once('listing12_15.php');

// Листинг 12.16

class HttpRequest extends Request
{
  public function init()
  {
    // Ради удобства здесь игнорируются отличия
    // в методах запросов POST, GET, т.д., но
    // этого нельзя делать в реальном проекте!
    $this->properties = $_REQUEST;
    $this->path = $_SERVER['PATH_INFO'];
    $this->path = (empty($this->path)) ? "/" : $this->path;
  }
}

?>
