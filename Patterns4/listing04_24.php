<?php

require_once "listing04_22.php";

// Листинг 04.23

class TestClass
{

  public static function storeIdentityObject(
                       IdentityObject $idobj)
  {
     // сделать что-нибудь с экземпляром типа IdentityObject
  }


  // Листинг 04.24

  public static function run()
  {
    $p = new ShopProduct();
    self::storeIdentityObject($p);
    print $p->calculateTax(100) . "<br />\n";
    print $p->generateId() . "<br />\n";

  }

}

TestClass::run();

?>
