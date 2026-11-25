<?php

declare(strict_types=1);

// Калькулятор в ООП-стиле: класс Calculator и перечисление Operation.

require_once __DIR__ . '/calculator_form.php';

renderCalculatorPage(
    'Калькулятор',
    static function (array $input): string {
        $calculator = Calculator::fromInput($input);

        return is_string($calculator) ? $calculator : $calculator->describe();
    },
    '<img src="../img/viber.jpg" alt="" style="width: 90px; height: 60px;">',
);
