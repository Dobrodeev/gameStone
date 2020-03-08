<?php

// Листинг 04.61

class XmlException extends \Exception
{
  private $error;

  public function __construct(\LibXmlError $error)
  {
    $shortfile = basename($error->file);
    $msg = "[{$shortfile}, строка {$error->line},
             столбец {$error->column}] {$error->message}";
    $this->error = $error;
    parent::__construct($msg, $error->code);
  }

  public function getLibXmlError()
  {
    return $this->error;
  }
}

?>
