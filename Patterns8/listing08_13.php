<?php

require_once('listing08_14.php');
require_once('listing08_15.php');


// листинг 08.13

abstract class Notifier
{
  public static function getNotifier(): Notifier
  {
    // получить конкретный класс в соответствии с
    // конфигурацией или другой логикой
    if (rand(1, 2) === 1) {
      return new MailNotifier();
    } else {
      return new TextNotifier();
    }
  }
  abstract public function inform($message);
}

?>
