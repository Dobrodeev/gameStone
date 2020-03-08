<?php

// Листинг 12.06

  // Класс Registry

  private $treeBuilder = null;
  private $conf = null;

  // ...

  public function treeBuilder(): TreeBuilder
  {
    if (is_null($this->treeBuilder)) {
     $this->treeBuilder = new TreeBuilder(
            $this->conf()->get('treedir'));
    }
    return $this->treeBuilder;
  }

  public function conf(): Conf
  {
    if (is_null($this->conf)) {
      $this->conf = new Conf();
    }
    return $this->conf;
  }

?>
