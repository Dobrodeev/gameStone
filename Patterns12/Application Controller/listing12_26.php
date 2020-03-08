<?php

require_once('listing12_24.php');

// Листинг 12.26

class ForwardViewComponent implements ViewComponent
{
  private $path = null;

  public function __construct($path)
  {
    $this->path = $path;
  }

  public function render(Request $request)
  {
    $request->forward($this->path);
  }
}

?>
