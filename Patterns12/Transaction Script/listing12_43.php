<?php

// Листинг 12.43

// Класс VenueManager

  public function bookEvent(int $spaceid, string $name,
                            int $time, int $duration)
  {
    $pdo = $this->getPdo();
    $stmt = $pdo->prepare($this->addevent);
    $stmt->execute([$name, $spaceid, $time, $duration]);
  }

?>
