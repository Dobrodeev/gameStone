<?php

// Листинг 13.15

  public function getCollection(array $raw): Collection
  {
    return new SpaceCollection($raw, $this);
  }

?>
