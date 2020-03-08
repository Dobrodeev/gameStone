<?php

require_once('listing06_04.php');

// Листинг 06.06

class TextParamHandler extends ParamHandler
{
  public function write(): bool
  {
    // записать текст,
   // используя свойство $this->params
	return true;
  }

  public function read(): bool
  {
    // прочитать параметры в формате XML
    // и заполнить свойство $this->params
	return true;
  }
}

?>
