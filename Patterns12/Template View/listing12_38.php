<?php

// Листинг 12.38

  public function render(string $resource, Request $request)
  {
    $vh = new ViewHelper();
    // теперь в шаблоне будет присутствовать переменная $vh
    include($resource);
  }

?>
