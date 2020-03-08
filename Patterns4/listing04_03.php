<?php

require_once "listing03_50.php";
require_once "listing03_49.php";

// Листинг 04.03

class ShopProduct
{
  private $title;
  private $producerMainName;
  private $producerFirstName;
  protected $price;
  private $discount = 0;

  private $id = 0;

  public function __construct(
      string $title,
      string $firstName,
      string $mainName,
      float $price
  ) {
      $this->title = $title;
      $this->producerFirstName = $firstName;
      $this->producerMainName = $mainName;
      $this->price = $price;
  }

  public function getProducerFirstName()
  {
    return $this->producerFirstName;
  }

  public function getProducerMainName()
  {
    return $this->producerMainName;
  }

  public function setDiscount($num)
  {
    $this->discount = $num;
  }

  public function getDiscount()
  {
    return $this->discount;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getPrice()
  {
    return ($this->price - $this->discount);
  }

  public function getProducer()
  {
    return $this->producerFirstName . " "
         . $this->producerMainName;
  }

  public function getSummaryLine()
  {
    $base = "{$this->title} ( {$this->producerMainName}, ";
    $base .= "{$this->producerFirstName} )";
    return $base;
  }

  public function setID(int $id)
  {
     $this->id = $id;
  }

// ...
  public static function getInstance(int $id, \PDO $pdo): ShopProduct
  {
    $stmt = $pdo->prepare("select * from products where id=?");
    $result = $stmt->execute([$id]);
    $row = $stmt->fetch();
    if (empty($row)) {
    return null;
    }

    if ($row['type'] == "book") {
       $product = new BookProduct(
              $row['title'],
              $row['firstname'],
              $row['mainname'],
              (float) $row['price'],
                (int) $row['numpages']
             );

    } elseif ($row['type'] == "cd") {

             $product = new CdProduct(
                        $row['title'],
                        $row['firstname'],
                        $row['mainname'],
                        (float) $row['price'],
                        (int) $row['playlength']
                       );
     } else {
            $firstname = (is_null($row['firstname'])) ? "" : $row['firstname'];
            $product = new ShopProduct(
                           $row['title'],
                           $firstname,
                           $row['mainname'],
                           (float) $row['price']
                    );
     }

     $product->setId((int) $row['id']);
     $product->setDiscount((int) $row['discount']);
     return $product;
   }




}

?>
