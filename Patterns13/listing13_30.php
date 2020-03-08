<?php

// Листинг 13.30

  // Класс EventMapper
  public function findBySpaceId(int $sid)
  {
    return new DeferredEventCollection(
        $this,
        $this->selectBySpaceStmt,
        [$sid]
    );
  }


?>
