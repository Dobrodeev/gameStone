<?php

// Листинг 13.27

  // Класс SpaceMapper

  protected function doCreateObject(array $raw):
                                    DomainObject
  {
    $obj = new Space((int)$raw['id'], $raw['name']);
    $venmapper = new VenueMapper();
    $venue = $venmapper->find((int)$raw['venue']);
    $obj->setVenue($venue);

    $eventmapper = new EventMapper();
    $eventcollection = $eventmapper->
                       findBySpaceId((int)$raw['id']);
    $obj->setEvents($eventcollection);
    return $obj;
}

?>
