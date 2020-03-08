<?php

// Листинг 11.26

public function handleLogin(string $user, string $pass,
                            string $ip)
{
  switch (rand(1, 3)) {
    case 1:
      $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
      $isvalid = true;
      break;
    case 2:
      $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
      $isvalid = false;
      break;
    case 3:
      $this->setStatus(self::LOGIN_USER_UNKNOWN,
                       $user, $ip);
      $isvalid = false;
      break;
  }
  $this->notify();
  return $isvalid;
}

?>
