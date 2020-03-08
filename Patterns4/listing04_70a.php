<?php

// Листинг 04.70a

try {
     eval("Некорректный код");
} catch (\Error $e) {
  print get_class($e)."\n";
} catch (\Exception $e) {
  // Обработать как-нибудь исключение типа Exception
}



?>
