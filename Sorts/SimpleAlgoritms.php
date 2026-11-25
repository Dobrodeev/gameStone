<?php

declare(strict_types=1);

require_once __DIR__ . '/RecursivClass.php';

enum Month: int
{
    case January = 1;
    case February = 2;
    case March = 3;
    case April = 4;
    case May = 5;
    case June = 6;
    case July = 7;
    case August = 8;
    case September = 9;
    case October = 10;
    case November = 11;
    case December = 12;
}

/**
 * Простые алгоритмические задачи. Методы возвращают данные, вывод — на странице SimpleAlgoritmsAnd.php.
 */
final class SimpleAlgoritms
{
    /**
     * Задача 1, вариант 1: числа от A до B, каждое повторено столько раз, каково его значение.
     * (2, 5) → ['22', '333', '4444', '55555']
     *
     * @return list<string>
     */
    public static function repeatedNumbers(int $a, int $b): array
    {
        self::assertRange($a, $b);

        return array_map(static fn(int $n): string => str_repeat((string)$n, $n), range($a, $b));
    }

    /**
     * Задача 1, вариант 2: строка номер k (k = 1..B) содержит числа от max(A, k) до B.
     * (2, 5) → ['2345', '2345', '345', '45', '5']
     *
     * @return list<string>
     */
    public static function numberPyramid(int $a, int $b): array
    {
        self::assertRange($a, $b);

        return array_map(static fn(int $k): string => implode('', range(max($a, $k), $b)), range(1, $b));
    }

    /**
     * Квадратная матрица n×n, заполненная числами 1..n² по строкам.
     *
     * @return list<list<int>>
     */
    public static function matrix(int $n): array
    {
        return array_chunk(range(1, $n * $n), $n);
    }

    /**
     * Транспонирование: строки становятся столбцами.
     *
     * @param list<list<int>> $matrix
     * @return list<list<int>>
     */
    public static function transpose(array $matrix): array
    {
        return array_map(null, ...$matrix);
    }

    /**
     * Чётные столбцы остаются как есть, нечётные (считая с 0) переворачиваются сверху вниз — «змейка».
     *
     * @param list<list<int>> $matrix
     * @return list<list<int>>
     */
    public static function snakeColumns(array $matrix): array
    {
        $n = count($matrix);
        $result = $matrix;
        foreach ($matrix as $i => $row) {
            foreach ($row as $j => $value) {
                if ($j % 2 === 1) {
                    $result[$i][$j] = $matrix[$n - 1 - $i][$j];
                }
            }
        }

        return $result;
    }

    /**
     * Квадрат n×n из нулей, на обеих диагоналях — X (центр нечётного квадрата остаётся 0).
     *
     * @return list<string>
     */
    public static function diagonalCross(int $n): array
    {
        $rows = [];
        for ($i = 0; $i < $n; $i++) {
            $row = '';
            for ($j = 0; $j < $n; $j++) {
                $row .= (($i === $j) xor ($j === $n - 1 - $i)) ? 'X' : '0';
            }
            $rows[] = $row;
        }

        return $rows;
    }

    /**
     * S = 1 + x²/2! + x⁴/4! + ... + x^(2n)/(2n)! (ряд Тейлора для ch x).
     * Факториал не пересчитывается заново, а накапливается от члена к члену.
     */
    public static function evenPowerSeries(float $x, int $n): float
    {
        $sum = 1.0;
        $term = 1.0;
        for ($i = 1; $i <= $n; $i++) {
            $term *= $x * $x / ((2 * $i - 1) * (2 * $i));
            $sum += $term;
        }

        return $sum;
    }

    /** Максимум без max(). */
    public static function maxElement(array $numbers): int|float
    {
        return array_reduce($numbers, static fn($carry, $n) => $carry === null || $n > $carry ? $n : $carry)
            ?? throw new InvalidArgumentException('Пустой массив');
    }

    /** Минимум без min(). */
    public static function minElement(array $numbers): int|float
    {
        return array_reduce($numbers, static fn($carry, $n) => $carry === null || $n < $carry ? $n : $carry)
            ?? throw new InvalidArgumentException('Пустой массив');
    }

    /** Есть ли среди трёх чисел хотя бы два чётных. */
    public static function hasTwoEven(int $a, int $b, int $c): bool
    {
        return count(array_filter([$a, $b, $c], static fn(int $n): bool => $n % 2 === 0)) >= 2;
    }

    /**
     * Задача про дату. Пользователь вводит строку ДДММГГ, например 240398.
     * Если ГГ >= 30, это 19ГГ, иначе 20ГГ.
     * Возвращает null, если дата некорректна (учитываются високосные годы).
     */
    public static function parseDate(string $value): ?DateTimeImmutable
    {
        if (!preg_match('/^(\d{2})(\d{2})(\d{2})$/', $value, $m)) {
            return null;
        }
        [, $day, $month, $year] = array_map(intval(...), $m);
        $year += $year >= 30 ? 1900 : 2000;

        return checkdate($month, $day, $year)
            ? new DateTimeImmutable(sprintf('%04d-%02d-%02d', $year, $month, $day))
            : null;
    }

    /** 14.03.2019 */
    public static function formatNumeric(DateTimeImmutable $date): string
    {
        return $date->format('d.m.Y');
    }

    /** 14 March 2019 */
    public static function formatWithMonthName(DateTimeImmutable $date): string
    {
        return $date->format('d') . ' ' . Month::from((int)$date->format('n'))->name . ' ' . $date->format('Y');
    }

    private static function assertRange(int $a, int $b): void
    {
        if ($a < 1 || $b < $a) {
            throw new InvalidArgumentException('Нужны положительные числа A <= B');
        }
    }
}
