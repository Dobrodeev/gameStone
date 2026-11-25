<?php

declare(strict_types=1);

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/PerevorotArray.php';

$text = (string)($_POST['text'] ?? '');
$position = filter_var($_POST['position'] ?? null, FILTER_VALIDATE_INT);

pageHeader('Переворот строки с заданной позиции');

try {
    if (!is_int($position)) {
        throw new InvalidArgumentException('Номер символа должен быть целым числом');
    }
    $result = PerevorotArray::reverseFrom($text, $position);
    echo '<p>Было: ', h($text), '<br>Стало: ', h($result), '</p>';
} catch (InvalidArgumentException $e) {
    echo '<p class="text-danger">', h($e->getMessage()), '</p>';
}

echo '<a href="TextPerevorot.php">Ещё раз</a>';
pageFooter();
