<?php

// Листинг 18.09

  // Класс ValidatorTest

  public function testValidateFalsePass()
  {
    $store = $this->getMock(__NAMESPACE__ . "\\UserStore");
    $this->validator = new Validator($store);

    $store->expects($this->once())
          ->method('notifyPasswordFailure')
          ->with($this->equalTo('bob@example.com'));

    $store->expects($this->any())
          ->method("getUser")
          ->will($this->returnValue([
                 "name" => "bob williams",
                 "mail" => "bob@example.com",
                 "pass" => "right"
          ]));

  $this->validator->validateUser(
         "bob@example.com", "wrong");

?>
