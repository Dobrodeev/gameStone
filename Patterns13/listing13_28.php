<?php

// Листинг 13.28

  // Класса Space

  public function getEvents2()
  {
    if (is_null($this->events)) {
      $this->events = $this->getFinder()->
                      findByScaceId($this->getId());
    }

    return $this->events;
  }

?>
