<?php

// Листинг 13.14

  // Конструктор SpaceMapper::__construct()

  $this->selectAllStmt = $this->pdo->prepare(
         "SELECT * FROM space"
  );
  $this->findByVenueStmt = $this->pdo->prepare(
         "SELECT * FROM space where venue=?"
  );

?>
