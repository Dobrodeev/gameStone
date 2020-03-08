<?php

// Листинг 12.42

// Класс VenueManager

  public function addVenue(string $name, array $spaces): array
  {
    $pdo = $this->getPdo();
    $ret = [];
    $ret['venue'] = [$name];
    $stmt = $pdo->prepare($this->addvenue);
    $stmt->execute($ret['venue']);
    $vid = $pdo->lastInsertId();

    $ret['spaces'] = [];

    $stmt = $pdo->prepare($this->addspace);
    foreach ($spaces as $spacename) {
      $values = [$spacename, $vid];
      $stmt->execute($values);
      $sid = $pdo->lastInsertId();
      array_unshift($values, $sid);
      $ret['spaces'][] = $values;
    }
    return $ret;
  }

?>
