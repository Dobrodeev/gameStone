<?php

declare(strict_types=1);

// Демонстрация односвязного списка.

require_once __DIR__ . '/List.php';

$h = static fn(mixed $value): string => htmlspecialchars((string)$value, ENT_QUOTES);
$show = static fn(Our_List $list): string => $list->isEmpty()
    ? 'список пуст'
    : $h(implode(' → ', $list->toArray())) . ' (элементов: ' . count($list) . ')';

$list = new Our_List();
$steps = [];

foreach ([1991, 1989, 1972, 1965, 'man'] as $item) {
    $list->pushFront($item);
}
$steps['Добавили в начало 1991, 1989, 1972, 1965, man'] = $show($list);

$list->pushBack(2024);
$steps['Добавили в конец 2024'] = $show($list);

$steps['Элемент с индексом 2'] = $h($list->get(2));

$taken = $list->popFront();
$steps["Взяли первый элемент: " . $h($taken)] = $show($list);

try {
    $list->get(10);
} catch (OutOfRangeException $e) {
    $steps['Элемент с индексом 10'] = $h($e->getMessage());
}

$removed = [];
while (!$list->isEmpty()) {
    $removed[] = $list->popFront();
}
$steps['Забрали все элементы по очереди: ' . $h(implode(', ', $removed))] = $show($list);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Односвязный список</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h3>Односвязный список</h3>
    <table class="table table-bordered">
        <tr><th>Действие</th><th>Результат</th></tr>
        <?php foreach ($steps as $action => $result): ?>
            <tr><td><?= $action ?></td><td><?= $result ?></td></tr>
        <?php endforeach; ?>
    </table>
</div>
<script src="../assets/jquery-3.2.1.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
