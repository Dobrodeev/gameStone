<?php

require_once('listing10_31.php');

// Листинг 10.34

class StructureRequest extends DecorateProcess
{
  public function process(RequestHelper $req)
  {
    print __CLASS__ . ": формирование данных запроса <br />\n";
    $this->processrequest->process($req);
  }
}

?>