<?php

declare(strict_types=1);

// Калькулятор в процедурном стиле: обычные функции и match вместо класса.

require_once __DIR__ . '/calculator_form.php';

function calculate(float $x, float $y, string $operation): float|string
{
    $divisionByZero = in_array($operation, ['/', '%'], true) && $y == 0.0;

    return match (true) {
        $divisionByZero => 'деление на ноль',
        $operation === '+' => $x + $y,
        $operation === '-' => $x - $y,
        $operation === '*' => $x * $y,
        $operation === '/' => $x / $y,
        $operation === '%' => fmod($x, $y),
        $operation === 'x^2+y^2' => $x ** 2 + $y ** 2,
        $operation === 'x^3+y^3' => $x ** 3 + $y ** 3,
        default => 'неизвестное действие',
    };
}

renderCalculatorPage(
    'Калькулятор (функции)',
    static function (array $input): string {
        $x = filter_var($input['first'] ?? '', FILTER_VALIDATE_FLOAT);
        $y = filter_var($input['second'] ?? '', FILTER_VALIDATE_FLOAT);
        $operation = (string)($input['operation'] ?? '');

        if ($x === false || $y === false) {
            return 'Введите два числа';
        }
        if ($operation === '') {
            return 'Не выбрано действие';
        }

        $result = calculate($x, $y, $operation);

        return is_float($result) ? Calculator::format($result) : $result;
    },
);
