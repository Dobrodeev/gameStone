<?php

declare(strict_types=1);

/**
 * Факториал (циклом и рекурсией) и перевод градусов Цельсия в Фаренгейты.
 */
final class RecursivClass
{
    /** n! через рекурсию. */
    public function factorialRecursive(int $n): int|float
    {
        $this->assertNotNegative($n);

        return $n <= 1 ? 1 : $n * $this->factorialRecursive($n - 1);
    }

    /** n! через цикл. */
    public function factorialLoop(int $n): int|float
    {
        $this->assertNotNegative($n);

        $factorial = 1;
        for ($i = 2; $i <= $n; $i++) {
            $factorial *= $i;
        }

        return $factorial;
    }

    /** F = 9 / 5 × C + 32 */
    public static function celsiusToFahrenheit(float $celsius): float
    {
        return 9 / 5 * $celsius + 32;
    }

    /**
     * Таблица перевода: $rows строк, начиная с $start, с шагом $step.
     *
     * @return array<int, array{celsius: float, fahrenheit: float}>
     */
    public function degreesTable(float $start, float $step, int $rows): array
    {
        $table = [];
        for ($i = 0; $i < $rows; $i++) {
            $celsius = $start + $step * $i;
            $table[] = ['celsius' => $celsius, 'fahrenheit' => self::celsiusToFahrenheit($celsius)];
        }

        return $table;
    }

    private function assertNotNegative(int $n): void
    {
        if ($n < 0) {
            throw new InvalidArgumentException('Факториал определён только для n >= 0');
        }
    }
}
