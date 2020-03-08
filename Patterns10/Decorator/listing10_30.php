<?php

require_once('listing10_29.php');

// Листинг 10.30

class MainProcess extends ProcessRequest
{
  public function process(RequestHelper $req)
  {
    print __CLASS__ . ": выполнение запроса <br />\n";
  }
}

?>
