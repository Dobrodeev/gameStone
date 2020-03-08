<?php

require_once('listing10_36.php');

// Листинг 10.38

class ProductFacade
{
  private $products = [];

  public function __construct(string $file)
  {
    $this->file = $file;
    $this->compile();
  }

  private function compile()
  {
    $lines = getProductFileLines($this->file);
    foreach ($lines as $line) {
      $id = getIDFromLine($line);
      $name = getNameFromLine($line);
      $this->products[$id] =
             getProductObjectFromID($id, $name);
    }
  }

  public function getProducts(): array
  {
    return $this->products;
  }

  public function getProduct(string $id): \Product
  {
    if (isset($this->products[$id])) {
      return $this->products[$id];
    }
    return null;
  }
}

?>
