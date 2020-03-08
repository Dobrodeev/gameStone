<?php

// Листинг 18.08

  // Класс UserStoreTest

  public function testAddUserDuplicate()
  {
    try {
      $ret = $this->store->addUser("bob williams",
                                   "a@b.com", "123456");
      $ret = $this->store->addUser("bob stevens",
                                   "a@b.com", "123456");
      self::fail("Здесь должно быть вызвано исключение.");
    } catch (\Exception $e) {
      $const = $this->logicalAnd(
        $this->logicalNot($this->contains("bob stevens")),
        $this->isType('array')
      );
      self::AssertThat($this->store->getUser(
                       "a@b.com"), $const);
    }
  }

?>
