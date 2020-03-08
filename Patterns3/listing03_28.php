<?php


// Листинг 03.28

class ConfReader
{
  public function getValues(array $default = null)
  {
    $values = [];

    // Выполнить действия для получения новых значений

    // Объединить полученные значения со стандартными
    // (результат всегда будет находиться в массиве)

    $values = array_merge($default, $values);
    return $values;
  }
}

?>
