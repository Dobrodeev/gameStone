<?php

declare(strict_types=1);

/**
 * Обыкновенная дробь. Неизменяемая: арифметические операции возвращают новую дробь.
 * Дробь всегда хранится в несократимом виде, знак — в числителе: 6/-8 → -3/4.
 */
final readonly class Fraction implements Stringable
{
    public int $numerator;
    public int $denominator;

    /** @throws InvalidArgumentException если знаменатель равен нулю */
    public function __construct(int $numerator = 1, int $denominator = 1)
    {
        if ($denominator === 0) {
            throw new InvalidArgumentException('Знаменатель не может быть равен нулю');
        }

        $sign = $denominator < 0 ? -1 : 1;
        $gcd = self::gcd($numerator, $denominator);
        $this->numerator = intdiv($sign * $numerator, $gcd);
        $this->denominator = intdiv(abs($denominator), $gcd);
    }

    /** Дробь из строки вида «3/4», «-3/4» или «5». */
    public static function fromString(string $value): self
    {
        if (!preg_match('~^\s*(-?\d+)\s*(?:/\s*(-?\d+)\s*)?$~', $value, $m)) {
            throw new InvalidArgumentException("Не дробь: «{$value}»");
        }

        return new self((int)$m[1], (int)($m[2] ?? 1));
    }

    public function add(self $other): self
    {
        return new self(
            $this->numerator * $other->denominator + $other->numerator * $this->denominator,
            $this->denominator * $other->denominator,
        );
    }

    public function subtract(self $other): self
    {
        return $this->add($other->negate());
    }

    public function multiply(self $other): self
    {
        return new self($this->numerator * $other->numerator, $this->denominator * $other->denominator);
    }

    /** @throws DivisionByZeroError при делении на нулевую дробь */
    public function divide(self $other): self
    {
        if ($other->numerator === 0) {
            throw new DivisionByZeroError('Деление на ноль');
        }

        return new self($this->numerator * $other->denominator, $this->denominator * $other->numerator);
    }

    public function negate(): self
    {
        return new self(-$this->numerator, $this->denominator);
    }

    /**
     * Выделение целой части: 743/51 → [14, 29, 51] (14 целых 29/51).
     *
     * @return array{int, int, int} [целая часть, числитель, знаменатель]
     */
    public function toMixed(): array
    {
        $whole = intdiv($this->numerator, $this->denominator);

        return [$whole, abs($this->numerator % $this->denominator), $this->denominator];
    }

    public function toFloat(): float
    {
        return $this->numerator / $this->denominator;
    }

    public function __toString(): string
    {
        return $this->denominator === 1 ? (string)$this->numerator : "{$this->numerator}/{$this->denominator}";
    }

    /** Наибольший общий делитель (алгоритм Евклида). */
    private static function gcd(int $a, int $b): int
    {
        [$a, $b] = [abs($a), abs($b)];
        while ($b !== 0) {
            [$a, $b] = [$b, $a % $b];
        }

        return max($a, 1);
    }
}
