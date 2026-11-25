<?php

declare(strict_types=1);

require_once __DIR__ . '/CircleAndCircle.php';
require_once __DIR__ . '/CircleAndCircleClass.php';

$names = ['x1', 'y1', 'r1', 'x2', 'y2', 'r2'];
$values = array_map(
    static fn(string $name): string => trim((string)($_POST[$name] ?? '')),
    array_combine($names, $names),
);

if (!isset($_POST['go'])) {
    renderCirclesPage();
    exit;
}

// 0 — допустимая координата, поэтому проверяем именно «число или нет», а не «пусто или нет»
$numbers = array_map(static fn(string $v): float|false => filter_var($v, FILTER_VALIDATE_FLOAT), $values);
if (in_array(false, $numbers, true)) {
    renderCirclesPage($values, error: 'Введите все данные числами');
    exit;
}

try {
    $first = new CircleAndCircleClass($numbers['x1'], $numbers['y1'], $numbers['r1']);
    $second = new CircleAndCircleClass($numbers['x2'], $numbers['y2'], $numbers['r2']);
    renderCirclesPage($values, result: $first->countIntersections($second)->label());
} catch (InvalidArgumentException $e) {
    renderCirclesPage($values, error: $e->getMessage());
}
