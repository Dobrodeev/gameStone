<?php

declare(strict_types=1);

/**
 * Задача 4. Сортировка двумерного массива.
 *
 * В файле sort.php находится массив, его нужно отсортировать так:
 *  - по возрастанию в алфавитном порядке по значению [0];
 *  - если значения [0] одинаковы — по возрастанию суммы значений [1] и [2].
 *
 * Кроме решения задачи здесь собраны классические алгоритмы сортировки.
 * Все они принимают компаратор в стиле usort(): fn($a, $b): int (<0, 0, >0),
 * не изменяют исходный массив и возвращают отсортированную копию.
 */
final class SortClass
{
    /** Компаратор по условию задачи 4. */
    public static function compareTaskRows(array $a, array $b): int
    {
        return [$a[0], $a[1] + $a[2]] <=> [$b[0], $b[1] + $b[2]];
    }

    /** Компаратор для чисел и строк по возрастанию. */
    public static function ascending(mixed $a, mixed $b): int
    {
        return $a <=> $b;
    }

    /** Решение задачи 4 стандартной функцией usort(). */
    public static function sortTask(array $rows): array
    {
        usort($rows, self::compareTaskRows(...));

        return $rows;
    }

    /** Случайный массив строк вида [буква, 1..100, 1..100]. */
    public static function randomRows(int $size): array
    {
        $rows = [];
        for ($i = 0; $i < $size; $i++) {
            $rows[] = [chr(random_int(ord('a'), ord('z'))), random_int(1, 100), random_int(1, 100)];
        }

        return $rows;
    }

    /** Пузырьковая сортировка: проход прекращается, если обменов не было. */
    public static function bubbleSort(array $items, ?callable $cmp = null): array
    {
        $cmp ??= self::ascending(...);
        $items = array_values($items);
        $n = count($items);

        for ($i = 0; $i < $n - 1; $i++) {
            $swapped = false;
            for ($j = $n - 1; $j > $i; $j--) {
                if ($cmp($items[$j - 1], $items[$j]) > 0) {
                    [$items[$j - 1], $items[$j]] = [$items[$j], $items[$j - 1]];
                    $swapped = true;
                }
            }
            if (!$swapped) {
                break;
            }
        }

        return $items;
    }

    /** Сортировка выбором: максимум ставится в конец неотсортированной части. */
    public static function selectionSort(array $items, ?callable $cmp = null): array
    {
        $cmp ??= self::ascending(...);
        $items = array_values($items);

        for ($i = count($items) - 1; $i > 0; $i--) {
            $maxIndex = 0;
            for ($j = 1; $j <= $i; $j++) {
                if ($cmp($items[$j], $items[$maxIndex]) > 0) {
                    $maxIndex = $j;
                }
            }
            [$items[$maxIndex], $items[$i]] = [$items[$i], $items[$maxIndex]];
        }

        return $items;
    }

    /** Сортировка вставками (устойчивая). */
    public static function insertionSort(array $items, ?callable $cmp = null): array
    {
        $cmp ??= self::ascending(...);
        $items = array_values($items);

        for ($i = 1, $n = count($items); $i < $n; $i++) {
            $current = $items[$i];
            $j = $i - 1;
            while ($j >= 0 && $cmp($items[$j], $current) > 0) {
                $items[$j + 1] = $items[$j];
                $j--;
            }
            $items[$j + 1] = $current;
        }

        return $items;
    }

    /** Быстрая сортировка Хоара. */
    public static function quickSort(array $items, ?callable $cmp = null): array
    {
        $cmp ??= self::ascending(...);
        $items = array_values($items);
        if (count($items) > 1) {
            self::hoarePartition($items, 0, count($items) - 1, $cmp);
        }

        return $items;
    }

    private static function hoarePartition(array &$items, int $first, int $last, callable $cmp): void
    {
        $i = $first;
        $j = $last;
        $pivot = $items[intdiv($first + $last, 2)];

        while ($i <= $j) {
            while ($cmp($items[$i], $pivot) < 0) {
                $i++;
            }
            while ($cmp($items[$j], $pivot) > 0) {
                $j--;
            }
            if ($i <= $j) {
                [$items[$i], $items[$j]] = [$items[$j], $items[$i]];
                $i++;
                $j--;
            }
        }

        if ($first < $j) {
            self::hoarePartition($items, $first, $j, $cmp);
        }
        if ($i < $last) {
            self::hoarePartition($items, $i, $last, $cmp);
        }
    }

    /**
     * Сначала все чётные, потом все нечётные, порядок внутри групп сохраняется.
     *
     * @param list<int> $numbers
     * @return list<int>
     */
    public static function evenThenOdd(array $numbers): array
    {
        $isEven = static fn(int $n): bool => $n % 2 === 0;

        return [
            ...array_filter($numbers, $isEven),
            ...array_filter($numbers, static fn(int $n): bool => !$isEven($n)),
        ];
    }

    /**
     * То же самое за один проход двумя указателями с обменами.
     * Работает на месте, но порядок внутри групп не сохраняется (неустойчивая).
     *
     * @param list<int> $numbers
     * @return list<int>
     */
    public static function evenThenOddUnstable(array $numbers): array
    {
        $numbers = array_values($numbers);
        $left = 0;
        $right = count($numbers) - 1;

        while ($left < $right) {
            if ($numbers[$left] % 2 === 0) {
                $left++;
            } elseif ($numbers[$right] % 2 !== 0) {
                $right--;
            } else {
                [$numbers[$left], $numbers[$right]] = [$numbers[$right], $numbers[$left]];
            }
        }

        return $numbers;
    }
}
