<?php

// Листинг 13.12

  // Класс VenueMapper

  protected function doCreateObject(array $array):
            DomainObject
  {
    $obj = new Venue(
          (int)$array['id'],
          $array['name']
    );

    $spacemapper = new SpaceMapper();
    $spacecollection = $spacemapper->
                       findByVenue($array['id']);
    $obj->setSpaces($spacecollection);
    return $obj;
  }

?>