<?php

declare(strict_types=1);

require_once __DIR__ . '/Fraction.php';

/**
 * Красивый вывод дроби «в столбик» с выделением целой части:
 *
 *        29
 *    14 ----
 *        51
 */
final class BeautyFractionOutput
{
    /** Дробь в столбик: числитель, черта по ширине длинного числа, знаменатель. */
    public static function stacked(Fraction $fraction): string
    {
        if ($fraction->denominator === 1) {
            return (string)$fraction->numerator;
        }

        return self::column((string)$fraction->numerator, (string)$fraction->denominator);
    }

    /** Смешанная дробь в столбик: целая часть слева, по центру строки с чертой. */
    public static function mixed(Fraction $fraction): string
    {
        [$whole, $numerator, $denominator] = $fraction->toMixed();

        if ($numerator === 0) {
            return (string)$whole;
        }
        if ($whole === 0) {
            return self::stacked($fraction);
        }

        $prefix = (string)$whole . ' ';
        $indent = str_repeat(' ', strlen($prefix));
        [$top, $line, $bottom] = explode("\n", self::column((string)$numerator, (string)$denominator));

        return "{$indent}{$top}\n{$prefix}{$line}\n{$indent}{$bottom}";
    }

    private static function column(string $top, string $bottom): string
    {
        $width = max(strlen($top), strlen($bottom));

        return implode("\n", [
            str_pad($top, $width, ' ', STR_PAD_BOTH),
            str_repeat('-', $width),
            str_pad($bottom, $width, ' ', STR_PAD_BOTH),
        ]);
    }
}
