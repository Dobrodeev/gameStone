<?php

require_once('listing11_19.php');
require_once('listing11_18.php');
require_once('listing11_17.php');

// Листинг 11.20

$markers = [
  new RegexpMarker("/П.ть/"),
  new MatchMarker("Пять"),
  new MarkLogicMarker('$input equals "Пять"')
];

foreach ($markers as $marker) {
  print get_class($marker)."\n";
  $question = new TextQuestion(
              "Сколько лучей у Кремлевской звезды?", $marker);
  foreach (["Пять", "Четыре"] as $response) {
    print " Ответ: $response: ";
    if ($question->mark($response)) {
      print "Правильно!\n";
    } else {
      print "Неверно!\n";
    }
  }
}

?>
