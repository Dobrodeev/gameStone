<?php

// Листинг 13.16

  public function findByVenue($vid): Collection
  {
    $this->findByVenueStmt->execute([$vid]);
    return new SpaceCollection(
           $this->findByVenueStmt->fetchAll(), $this);
  }

?>
