<?php

// Листинг 13.10

  public function getVenueMapper(): VenueMapper
  {
    return new VenueMapper();
  }

  public function getSpaceMapper(): SpaceMapper
  {
    return new SpaceMapper();
  }

  public function getEventMapper(): EventMapper
  {
    return new EventMapper();
  }

  public function getVenueCollection(): VenueCollection
  {
    return new VenueCollection();
  }

  public function getSpaceCollection(): SpaceCollection
  {
    return new SpaceCollection();
  }

  public function getEventCollection(): EventCollection
  {
    return new EventCollection();
  }

?>
