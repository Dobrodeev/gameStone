<?php

declare(strict_types=1);

// Задача 2: таблица перевода градусов Цельсия в Фаренгейты.
// Этап 1 — таблица от 0 до 100 с шагом 20, этап 2 — те же вычисления с параметрами из формы.

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/RecursivClass.php';

// параметр из адресной строки; если его нет — значение по умолчанию, если он некорректный — false
$param = static fn(string $name, int|float $default, int $filter, array $options = []): int|float|false
    => isset($_GET[$name]) ? filter_var($_GET[$name], $filter, $options) : $default;

$start = $param('start', 0.0, FILTER_VALIDATE_FLOAT);
$step = $param('step', 20.0, FILTER_VALIDATE_FLOAT);
$rows = $param('rows', 6, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 1000]]);

$error = in_array(false, [$start, $step, $rows], true)
    ? 'Стартовое значение и шаг должны быть числами, количество строк — от 1 до 1000'
    : null;

pageHeader('Перевод градусов Цельсия в Фаренгейты');
?>
<form method="get" class="form-inline">
    <label>Старт <input type="text" name="start" value="<?= h($_GET['start'] ?? '0') ?>" class="form-control"></label>
    <label>Шаг <input type="text" name="step" value="<?= h($_GET['step'] ?? '20') ?>" class="form-control"></label>
    <label>Строк <input type="text" name="rows" value="<?= h($_GET['rows'] ?? '6') ?>" class="form-control"></label>
    <button type="submit" class="btn btn-default">Показать</button>
</form>
<?php if ($error !== null): ?>
    <p class="text-danger"><?= h($error) ?></p>
<?php else: ?>
    <table class="table table-bordered">
        <tr><th>Degrees Celsius</th><th>Degrees Fahrenheit</th></tr>
        <?php foreach ((new RecursivClass())->degreesTable($start, $step, $rows) as $row): ?>
            <tr>
                <td><?= number_format($row['celsius'], 2, '.', '') ?></td>
                <td><?= number_format($row['fahrenheit'], 2, '.', '') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif;
pageFooter();
