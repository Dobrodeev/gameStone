<?php

require_once('listing11_29.php');

// Листинг 11.30

class SecurityMonitor extends LoginObserver
{
  public function doUpdate(Login $login)
  {
    $status = $login->getStatus();
    if ($status[0] == Login::LOGIN_WRONG_PASS) {
      // послать сообщение по электронной почте
      // системному администратору
      print __CLASS__ . ": Отправка почты системному администратору<br />\n";
    }
  }
}

?>
