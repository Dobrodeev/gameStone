<?php

require_once('listing11_27.php');

// Листинг 11.28

class LoginAnalytics implements Observer
{
  public function update(Observable $observable)
  {
    // не обеспечивает типовую безопасность!
    $status = $observable->getStatus();
    print __CLASS__
          . ": обрабатываем информацию о полученном состоянии \n";
  }
}

?>
