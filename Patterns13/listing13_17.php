<?php

// Листинг 13.17

  // Класс Venue

  public function getSpaces2()
  {
    if (is_null($this->spaces)) {
      $reg = Registry::instance();
      $finder = $reg->getSpaceMapper();
      $this->spaces = $finder->findByVenue($this->getId());
    }

    return $this->spaces;
}

?>
