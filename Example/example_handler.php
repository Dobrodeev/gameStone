<?php

declare(strict_types=1);

require_once __DIR__ . '/ExampleClass.php';

$h = static fn(mixed $value): string => htmlspecialchars((string)$value, ENT_QUOTES);
$cardHtml = static fn(Card $card): string => sprintf(
    '<span class="card-face" style="color: %s">%s</span>',
    $card->suit->isRed() ? '#c00' : '#000',
    $h($card),
);
$table = static function (array $rows) use ($h): string {
    $html = '<table class="table table-bordered">';
    foreach ($rows as $label => $value) {
        $html .= "<tr><td>{$h($label)}</td><td>{$h($value)}</td></tr>";
    }

    return $html . '</table>';
};

$example = new ExampleClass();
$deal = $example->cardsGame();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Упражнения с массивами</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        .card-face { display: inline-block; min-width: 56px; padding: 12px 8px; margin: 4px; border: 1px solid #999;
                     border-radius: 6px; text-align: center; font-size: 22px; font-weight: bold; background: #fff; }
    </style>
</head>
<body>
<div class="container">
    <h3>Раздача карт</h3>
    <?php foreach ($deal['hands'] as $i => $hand): ?>
        <p>Игрок <?= $i + 1 ?>: <?= implode('', array_map($cardHtml, $hand)) ?></p>
    <?php endforeach; ?>
    <p>Флоп: <?= implode('', array_map($cardHtml, $deal['flop'])) ?></p>
    <p>Осталось карт в колоде: <?= $deal['left'] ?></p>

    <h3>Задачи на массив чисел</h3>
    <?= $table($example->exercisesArrays()) ?>

    <h3>Функции для работы с массивами</h3>
    <?= $table($example->someFunctionsArrays()) ?>
</div>
<script src="../assets/jquery-3.2.1.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
