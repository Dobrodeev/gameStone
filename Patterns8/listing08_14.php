<?php

require_once('listing08_13.php');

// Листинг 08.14

class MailNotifier extends Notifier
{
  public function inform($message)
  {
    print "Уведомление по электронной почте: {$message}\n";
  }
}

?>
