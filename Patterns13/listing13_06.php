<?php

require_once('listing13_05.php');

// Листинг 13.06

class VenueCollection extends Collection
{
  public function targetClass(): string
  {
    return Venue::class;
  }
}

?>
