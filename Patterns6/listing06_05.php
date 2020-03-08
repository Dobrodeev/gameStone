<?php

require_once('listing06_04.php');

// Листинг 06.05

class XmlParamHandler extends ParamHandler
{
  public function write(): bool
  {
    // записать параметры в формате XML,
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