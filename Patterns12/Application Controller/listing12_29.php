<?php

// Листинг 12.29

  private function setupOptions()
  {
    //...

    $vcfile = $conf->get("viewcomponentfile");
    $cparse = new ViewComponentCompiler();

    $commandandviewdata = $cparse->parseFile($vcfile);
    $reg->setCommands($commandandviewdata);
  }

?>
