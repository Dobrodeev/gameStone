<?php

// Листинг 13.26

  $venue = new Venue(-1, "The Green Trees");
  $venue->addSpace(
      new Space(-1, 'The Space Upstairs')
  );
  $venue->addSpace(
      new Space(-1, 'The Bar Stage')
  );

// Этот метод может быть вызван из контроллера
// или вспомогательного класса
  ObjectWatcher::instance()->performOperations();

?>
