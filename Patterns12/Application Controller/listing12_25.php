<?php

require_once('listing12_24.php');

// Листинг 12.25

class TemplateViewComponent implements ViewComponent
{
  private $name = null;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  public function render(Request $request)
  {
    $reg = Registry::instance();
    $conf = $reg->getConf();
    $path = $conf->get("templatepath");
    if (is_null($path)) {
      throw new AppException("Не найден каталог шаблонов!");
    }
    $fullpath = "{$path}/{$this->name}.php";
    if (! file_exists($fullpath)) {
      throw new AppException("Не найден шаблон для {$fullpath}");
    }
    include($fullpath);
  }
}

?>
