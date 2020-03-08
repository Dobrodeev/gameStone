<?php

require_once('listing08_13.php');

// Листинг 08.15

class TextNotifier extends Notifier
{
  public function inform($message)
  {
    print "Текстовое уведомление: {$message}\n";
  }
}

?>
