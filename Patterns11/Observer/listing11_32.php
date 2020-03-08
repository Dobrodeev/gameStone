<?php

require_once('listing11_29.php');

// Листинг 11.32

class PartnershipTool extends LoginObserver
{
  public function doUpdate(Login $login)
  {
    $status = $login->getStatus();
      // проверяем IP-адрес
      // отправим cookie-файл, если адрес соответствует списку
    print __CLASS__ .
     ": Отправка cookie-файла, если адрес соответствует списку<br />\n";
  }
}

?>