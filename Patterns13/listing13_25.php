<?php

// Листинг 13.25

  // Класс Space

  public function setVenue(Venue $venue)
  {
    $this->venue = $venue;
    $this->markDirty();
  }

  public function setName(string $name)
  {
    $this->name = $name;
    $this->markDirty();
  }

?>
