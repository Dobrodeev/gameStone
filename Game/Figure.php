<?php

declare(strict_types=1);

/**
 * Фигуры игры «Ножницы, бумага, колодец».
 * Ножницы режут бумагу, бумага накрывает колодец, ножницы падают в колодец.
 */
enum Figure: int
{
    case Scissors = 1;
    case Paper = 2;
    case Well = 3;

    public function label(): string
    {
        return match ($this) {
            self::Scissors => 'Ножницы',
            self::Paper => 'Бумага',
            self::Well => 'Колодец',
        };
    }

    public function beats(self $other): bool
    {
        return match ($this) {
            self::Scissors => $other === self::Paper,
            self::Paper => $other === self::Well,
            self::Well => $other === self::Scissors,
        };
    }

    /** 1 — победа, 0 — ничья, -1 — поражение. */
    public function against(self $other): int
    {
        return match (true) {
            $this === $other => 0,
            $this->beats($other) => 1,
            default => -1,
        };
    }

    public static function random(): self
    {
        $cases = self::cases();

        return $cases[array_rand($cases)];
    }
}
