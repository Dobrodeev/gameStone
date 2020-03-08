<?php

// Листинг 18.11

namespace popp\ch18\batch03;

class User
{
  private $name;
  private $mail;
  private $pass;
  private $failed;

  public function __construct(string $name, string $mail,
                              string $pass)
  {
    $this->name = $name;
    $this->mail = $mail;

    if (strlen($pass) < 5) {
      throw new \Exception(
                "Длина пароля должна быть не менее 5 символов."
      );
    }

    $this->pass = $pass;
  }

  public function getMail(): string
  {
    return $this->mail;
  }

  public function getPass(): string
  {
    return $this->pass;
  }

  public function failed(string $time)
  {
    $this->failed = $time;
  }
}

?>
