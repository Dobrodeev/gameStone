<?php

declare(strict_types=1);

// Калькулятор, который считает и на сервере (PHP, кнопка «Посчитать»),
// и в браузере (JavaScript, кнопка «Посчитать в браузере») — для сравнения двух подходов.

require_once __DIR__ . '/Calculator.php';

$h = static fn(mixed $value): string => htmlspecialchars((string)$value, ENT_QUOTES);
$operations = [Operation::Add, Operation::Subtract, Operation::Multiply, Operation::Divide, Operation::Modulo];
$checked = (string)($_POST['operation'] ?? Operation::Add->value);

$result = null;
if (isset($_POST['go'])) {
    $calculator = Calculator::fromInput($_POST);
    $result = is_string($calculator) ? $calculator : $calculator->describe();
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scientific calculations</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h3>Scientific calculations</h3>
    <form method="post" id="calculator">
        <div class="form-group">
            <input type="number" step="any" class="form-control" name="first" required
                   value="<?= $h($_POST['first'] ?? '') ?>">
        </div>
        <?php foreach ($operations as $operation): ?>
            <div class="radio">
                <label>
                    <input type="radio" name="operation" value="<?= $h($operation->value) ?>"
                        <?= $operation->value === $checked ? 'checked' : '' ?>>
                    <?= $h($operation->label()) ?>
                </label>
            </div>
        <?php endforeach; ?>
        <div class="form-group">
            <input type="number" step="any" class="form-control" name="second" required
                   value="<?= $h($_POST['second'] ?? '') ?>">
        </div>
        <button type="submit" name="go" class="btn btn-primary">Посчитать</button>
        <button type="button" id="calculate-js" class="btn btn-default">Посчитать в браузере</button>
    </form>
    <p id="demo"><?= $result !== null ? $h($result) : 'Результат вычислений' ?></p>
</div>
<script src="calculations_script.js"></script>
</body>
</html>
