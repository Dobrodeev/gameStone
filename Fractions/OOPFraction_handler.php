<?php

declare(strict_types=1);

// Калькулятор обыкновенных дробей: сумма, разность, произведение, частное.

require_once __DIR__ . '/BeautyFractionOutput.php';

$h = static fn(mixed $value): string => htmlspecialchars((string)$value, ENT_QUOTES);
$first = (string)($_GET['first'] ?? '1/2');
$second = (string)($_GET['second'] ?? '3/5');

$results = [];
$error = null;
try {
    $a = Fraction::fromString($first);
    $b = Fraction::fromString($second);
    $results = [
        "{$a} + {$b}" => static fn() => $a->add($b),
        "{$a} − {$b}" => static fn() => $a->subtract($b),
        "{$a} × {$b}" => static fn() => $a->multiply($b),
        "{$a} ÷ {$b}" => static fn() => $a->divide($b),
    ];
} catch (InvalidArgumentException $e) {
    $error = $e->getMessage();
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дроби</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h3>Обыкновенные дроби</h3>
    <form method="get" class="form-inline">
        <input type="text" name="first" class="form-control" value="<?= $h($first) ?>" placeholder="1/2">
        <input type="text" name="second" class="form-control" value="<?= $h($second) ?>" placeholder="3/5">
        <button type="submit" class="btn btn-primary">Посчитать</button>
    </form>
    <p class="help-block">Дробь в виде <code>3/4</code>, <code>-3/4</code> или целое число.</p>

    <?php if ($error !== null): ?>
        <p class="text-danger"><?= $h($error) ?></p>
    <?php else: ?>
        <table class="table table-bordered" style="width: auto">
            <tr><th>Выражение</th><th>Результат</th><th>В столбик</th><th>С целой частью</th></tr>
            <?php foreach ($results as $expression => $calculate):
                try {
                    $result = $calculate();
                } catch (DivisionByZeroError $e) {
                    printf('<tr><td>%s</td><td colspan="3">%s</td></tr>', $h($expression), $h($e->getMessage()));
                    continue;
                }
                ?>
                <tr>
                    <td><?= $h($expression) ?></td>
                    <td><?= $h($result) ?></td>
                    <td><pre><?= $h(BeautyFractionOutput::stacked($result)) ?></pre></td>
                    <td><pre><?= $h(BeautyFractionOutput::mixed($result)) ?></pre></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<script src="../assets/jquery-3.2.1.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
