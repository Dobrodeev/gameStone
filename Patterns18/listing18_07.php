<?php

// Листинг 18.07

//namespace popp\ch18\batch02;
//require_once('vendor/autoload.php');

require_once('/root/php5ed/vendor/autoload.php');
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
  private $validator;

  public function setUp() : void
  {
    $store = new UserStore();
    $store->addUser("bob williams",
                    "bob@example.com", "12345");
    $this->validator = new Validator($store);
  }

  public function tearDown() : void
  {
  }

  public function testValidateCorrectPass()
  {
    $this->assertTrue(
    $this->validator->validateUser(
                      "bob@example.com", "12345"),
                      "Ожидалась успешная проверка."
    );
  }
}

?>
