<?php

// Листинг 11.33

class Login implements \SplSubject
{
  private $storage;
  // ...

  public function __construct()
  {
    $this->storage = new \SplObjectStorage();
  }

  public function attach(\SplObserver $observer)
  {
    $this->storage->attach($observer);
  }

  public function detach(\SplObserver $observer)
  {
    $this->storage->detach($observer);
  }

  public function notify()
  {
    foreach ($this->storage as $obs) {
      $obs->update($this);
    }
  }
  // ...
}

?>
