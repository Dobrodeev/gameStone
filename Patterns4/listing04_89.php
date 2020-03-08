<?php

// Листинг 04.89

class Product {
  public $name;
  public $price;

  public function __construct(string $name, float $price)
  {
    $this->name = $name;
    $this->price = $price;
  }
}

class ProcessSale
{
  private $callbacks;

  public function registerCallback(callable $callback)
  {
    if (! is_callable($callback)) {
     throw new Exception("Функция обратного вызова — невызываемая!");
    }
    $this->callbacks[] = $callback;
  }

  public function sale(Product $product)
  {
    print "{$product->name}: обрабатывается...\r\n<br />";
    foreach ($this->callbacks as $callback) {
      call_user_func($callback, $product);
    }
  }
}

?>
