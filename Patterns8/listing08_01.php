<?php

// Листинг 08.01

abstract class Lesson
{
  protected $duration;
  const     FIXED = 1;
  const     TIMED = 2;
  private   $costtype;

  public function __construct(int $duration,
                              int $costtype = 1)
  {
    $this->duration = $duration;
    $this->costtype = $costtype;
  }

  public function cost(): int
  {
    switch ($this->costtype) {
      case self::TIMED:
        return (5 * $this->duration);
        break;
      case self::FIXED:
        return 30;
        break;
      default:
        $this->costtype = self::FIXED;
        return 30;
    }
  }

  public function chargeType(): string
  {
    switch ($this->costtype) {
      case self::TIMED:
        return "Почасовая оплата";
        break;
      case self::FIXED:
        return "Фиксированная ставка";
        break;
      default:
        $this->costtype = self::FIXED;
        return "Фиксированная ставка";
    }
  }

  // Другие методы из класса Lesson...
}

?>
