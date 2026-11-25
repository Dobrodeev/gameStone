<?php

declare(strict_types=1);

// Тот же калькулятор, что и calculator_handler.php, но без картинки над формой.

require_once __DIR__ . '/calculator_form.php';

renderCalculatorPage(
    'Калькулятор',
    static function (array $input): string {
        $calculator = Calculator::fromInput($input);

        return is_string($calculator) ? $calculator : $calculator->describe();
    },
);
