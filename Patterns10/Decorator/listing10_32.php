<?php

require_once('listing10_31.php');

// Листинг 10.32

class LogRequest extends DecorateProcess
{
  public function process(RequestHelper $req)
  {
    print __CLASS__ . ": регистрация запроса <br />\n";
    $this->processrequest->process($req);
  }
}

?>
