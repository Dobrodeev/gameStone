<?php

// Листинг 18.12

public function testGetUser()
{
  $this->store->addUser("bob williams", "a@b.com", "12345");
  $user = $this->store->getUser("a@b.com");
  $this->assertEquals($user->getMail(), "a@b.com");
}

?>
