<?php

declare(strict_types=1);

// Постфиксный и префиксный инкремент: $x++ возвращает старое значение, ++$x — новое.
// Функции post() и pref() повторяют их поведение вручную через передачу по ссылке.

require_once __DIR__ . '/layout.php';

function post(int &$x): int
{
    $old = $x;
    $x++;

    return $old;
}

function pref(int &$x): int
{
    return ++$x;
}

pageHeader('Постфиксный и префиксный инкремент');
?>
<table class="table table-bordered" style="width: auto">
    <tr><th>Выражение (x = 10)</th><th>Вернуло</th><th>x после</th></tr>
    <?php
    $cases = [
        'post($x)' => static fn(int &$x): int => post($x),
        '$x++' => static fn(int &$x): int => $x++,
        'pref($x)' => static fn(int &$x): int => pref($x),
        '++$x' => static fn(int &$x): int => ++$x,
    ];
    foreach ($cases as $expression => $increment):
        $x = 10;
        $returned = $increment($x);
        ?>
        <tr><td><code><?= h($expression) ?></code></td><td><?= $returned ?></td><td><?= $x ?></td></tr>
    <?php endforeach; ?>
</table>
<?php
pageFooter();
