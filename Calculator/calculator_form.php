<?php

declare(strict_types=1);

require_once __DIR__ . '/Calculator.php';

/**
 * Общая страница калькулятора: форма + результат.
 *
 * @param callable(array): ?string $calculate получает данные формы, возвращает строку результата
 *                                            (или null, если форма ещё не отправлена)
 */
function renderCalculatorPage(string $title, callable $calculate, string $beforeForm = ''): void
{
    $h = static fn(mixed $value): string => htmlspecialchars((string)$value, ENT_QUOTES);
    $submitted = isset($_POST['go']);
    $result = $submitted ? $calculate($_POST) : null;
    $checked = (string)($_POST['operation'] ?? '');
    ?>
    <!doctype html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $h($title) ?></title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <h3><?= $h($title) ?></h3>
        <?= $beforeForm ?>
        <form method="post" name="calculator">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="первое число" required name="first"
                       value="<?= $h($_POST['first'] ?? '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="второе число" required name="second"
                       value="<?= $h($_POST['second'] ?? '') ?>">
            </div>
            <?php foreach (Operation::cases() as $operation): ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="operation" value="<?= $h($operation->value) ?>"
                            <?= $operation->value === $checked ? 'checked' : '' ?>>
                        <?= $h($operation->label()) ?>
                    </label>
                </div>
            <?php endforeach; ?>
            <button type="submit" name="go" class="btn btn-primary">&nbsp;=&nbsp;</button>
            <button type="reset" class="btn btn-default">Сброс</button>
        </form>
        <?php if ($result !== null): ?>
            <h4>Результат</h4>
            <p><?= $h($result) ?></p>
        <?php endif; ?>
    </div>
    <script src="../assets/jquery-3.2.1.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}
