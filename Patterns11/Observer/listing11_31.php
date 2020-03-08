<?php

require_once('listing11_29.php');

// Листинг 11.31

class GeneralLogger extends LoginObserver
{
  public function doUpdate(Login $login)
  {
    $status = $login->getStatus();
    // записать данные регистрации в системный журнал
    print __CLASS__ . ": Регистрация в системном журнале<br />\n";
  }
}


?>
