<?php

// Листинг 18.06

//namespace popp\ch18\batch02;
//require_once('vendor/autoload.php');
require_once('/root/php5ed/vendor/autoload.php');
//require_once('listing18_01.php');

use PHPUnit\Framework\TestCase;



class UserStoreTest extends TestCase
{
  private $store;

  public function setUp(): void
  {
    $this->store = new UserStore();
  }

  public function testAddUserShortPass()
  {
    $this->expectException('\\Exception');
    $this->store->addUser("bob williams", "a@b.com", "ff");
    $this->fail("Ожидалось исключение из-за короткого пароля.");
  }
}

?>
