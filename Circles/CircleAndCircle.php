<?php

declare(strict_types=1);

// Задача 0: форма ввода двух окружностей (центр и радиус) и количество их точек пересечения.
// Страница отправляет форму в CircleAndCircle_handler.php, а тот подключает её снова вместе с результатом.

/**
 * @param array<string, string> $values введённые значения для повторного показа в форме
 */
function renderCirclesPage(array $values = [], ?string $result = null, ?string $error = null): void
{
    $h = static fn(mixed $value): string => htmlspecialchars((string)$value, ENT_QUOTES);
    $fields = ['x' => 'Координата центра по X', 'y' => 'Координата центра по Y', 'r' => 'Радиус, мм'];
    ?>
    <!doctype html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Пересечение двух окружностей</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <h3>Определение количества точек пересечения двух окружностей</h3>
        <form action="CircleAndCircle_handler.php" method="post">
            <?php foreach ([1, 2] as $n): ?>
                <h4>Окружность <?= $n ?></h4>
                <?php foreach ($fields as $key => $label):
                    $name = "{$key}{$n}"; ?>
                    <div class="form-group">
                        <label for="<?= $name ?>"><?= $h($label) ?></label>
                        <input type="number" step="any" <?= $key === 'r' ? 'min="0"' : '' ?> required
                               class="form-control" id="<?= $name ?>" name="<?= $name ?>"
                               placeholder="<?= strtoupper($name) ?>" value="<?= $h($values[$name] ?? '') ?>">
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary" name="go">Посчитать</button>
        </form>
        <?php if ($result !== null): ?>
            <h4 class="text-info">Точек пересечения: <?= $h($result) ?></h4>
        <?php endif; ?>
        <?php if ($error !== null): ?>
            <p class="text-danger"><?= $h($error) ?></p>
        <?php endif; ?>
    </div>
    <script src="../assets/jquery-3.2.1.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}

if (realpath($_SERVER['SCRIPT_FILENAME'] ?? '') === __FILE__) {
    renderCirclesPage();
}
