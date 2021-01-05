<?php

// Листинг 11.21

class Login
{
  const LOGIN_USER_UNKNOWN = 1;
  const LOGIN_WRONG_PASS = 2;
  const LOGIN_ACCESS = 3;

  private $status = [];

  public function handleLogin(string $user, string $pass,
                              string $ip): bool
  {
    $isvalid=false;
    switch (rand(1, 3)) {
      case 1:
        $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
        $isvalid = true;
        break;
      case 2:
        $this->setStatus(self::LOGIN_WRONG_PASS,
                         $user, $ip);
        $isvalid = false;
        break;
      case 3:
        $this->setStatus(self::LOGIN_USER_UNKNOWN,
                         $user, $ip);
        $isvalid = false;
        break;
    }

    print "возвращается ".(($isvalid)?"истина":"ложь")."<br />\n";

/*
    Logger::logIP($user, $ip, $this->getStatus());

  if (! $isvalid) {
      Notifier::mailWarning(
        $user,
        $ip,
        $this->getStatus()
      );
  }

*/

    return $isvalid;
  }

  private function setStatus(int $status, string $user,
                             string $ip)
  {
    $this->status = [$status, $user, $ip];
  }

  public function getStatus(): array
  {
    return $this->status;
  }
}

?>