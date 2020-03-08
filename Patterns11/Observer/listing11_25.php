<?php

require_once('listing11_24.php');

// Листинг 11.25

class Login implements Observable
{
  private $observers = [];
  private $storage;

  const LOGIN_USER_UNKNOWN = 1;
  const LOGIN_WRONG_PASS = 2;
  const LOGIN_ACCESS = 3;

  public function attach(Observer $observer)
  {
    $this->observers[] = $observer;
  }

  public function detach(Observer $observer)
  {
    $this->observers = array_filter(
           $this->observers,
           function ($a) use ($observer) {
             return (! ($a === $observer ));
           }
    );
  }

  public function notify()
  {
    foreach ($this->observers as $obs) {
      $obs->update($this);
    }
  }

  public function handleLogin(string $user, string $pass,
                            string $ip)
  {
     switch (rand(1, 3)) {
       case 1:
         $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
         $isvalid = true;
         break;
       case 2:
         $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
         $isvalid = false;
         break;
       case 3:
         $this->setStatus(self::LOGIN_USER_UNKNOWN,
                       $user, $ip);
         $isvalid = false;
         break;
     }
     $this->notify();
     return $isvalid;
  }

  // ...
}

?>
