<?php

// Листинг 13.11

  // Класс Venue

  public function getSpaces(): SpaceCollection
  {
    if (is_null($this->spaces)) {
      $reg = Registry::instance();
      $this->spaces = $reg->getSpaceCollection();
    }

    return $this->spaces;
  }

  public function setSpaces(SpaceCollection $spaces)
  {
    $this->spaces = $spaces;
  }

  public function addSpace(Space $space)
  {
    $this->getSpaces()->add($space);
    $space->setVenue($this);
  }

?>
