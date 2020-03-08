<?php

require_once('listing08_13.php');

// Листинг 08.12

class RegistrationMgr
{
  public function register(Lesson $lesson)
  {
    // Сделать что-нибудь с классом Lesson...

    // а теперь отправить кому-нибудь сообщение
    $notifier = Notifier::getNotifier();
    $notifier->inform("Новое занятие: стоимость - ({$lesson->cost()})<br />");
  }
}

?>
