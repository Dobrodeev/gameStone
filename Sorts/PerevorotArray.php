<?php

declare(strict_types=1);

/**
 * Упражнения со строками и числовыми рядами.
 * Все строковые функции работают с UTF-8 (кириллица не ломается).
 */
final class PerevorotArray
{
    /**
     * Задача 3: перевернуть строку задом наперёд, начиная с символа номер $position (нумерация с 1).
     * Пример: ('abcdefgggh', 5) → 'abcdhgggfe'.
     */
    public static function reverseFrom(string $text, int $position): string
    {
        $length = mb_strlen($text);
        if ($position < 1 || $position > $length) {
            throw new InvalidArgumentException("Позиция должна быть от 1 до {$length}");
        }

        $head = mb_substr($text, 0, $position - 1);
        $tail = mb_str_split(mb_substr($text, $position - 1));

        return $head . implode('', array_reverse($tail));
    }

    /**
     * Текст в разных регистрах и разбитый на слова.
     *
     * @return array{original: string, upper: string, lower: string, ucfirst: string, words: list<string>}
     */
    public static function caseVariants(string $text): array
    {
        return [
            'original' => $text,
            'upper' => mb_strtoupper($text),
            'lower' => mb_strtolower($text),
            'ucfirst' => mb_ucfirst($text),
            'words' => preg_split('/\s+/u', trim($text), flags: PREG_SPLIT_NO_EMPTY),
        ];
    }

    /** Сумма первых $count членов гармонического ряда 1 + 1/2 + 1/3 + ... */
    public static function harmonicSum(int $count): float
    {
        $sum = 0.0;
        for ($i = 1; $i <= $count; $i++) {
            $sum += 1 / $i;
        }

        return $sum;
    }

    /**
     * Первые $count чисел Фибоначчи: 1, 1, 2, 3, 5, ...
     *
     * @return list<int>
     */
    public static function fibonacci(int $count): array
    {
        $sequence = [];
        [$a, $b] = [1, 1];
        for ($i = 0; $i < $count; $i++) {
            $sequence[] = $a;
            [$a, $b] = [$b, $a + $b];
        }

        return $sequence;
    }

    /** Очистка пользовательского ввода перед выводом в HTML. */
    public static function clear(string $text): string
    {
        return htmlspecialchars(strip_tags(trim($text)), ENT_QUOTES);
    }
}
