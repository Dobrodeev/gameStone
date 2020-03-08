<?php

require_once('listing11_27.php');

// Листинг 11.29

abstract class LoginObserver implements Observer
{
  private $login;

  public function __construct(Login $login)
  {
    $this->login = $login;
    $login->attach($this);
  }

  public function update(Observable $observable)
  {
    if ($observable === $this->login) {
      $this->doUpdate($observable);
    }
  }

  abstract public function doUpdate(Login $login);
}

?>
