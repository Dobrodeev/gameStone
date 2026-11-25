<?php

declare(strict_types=1);

// Статистика введённых чисел с хранением в базе данных (таблица numbers_statistics).
// Числа копятся в базе; ввод 0 показывает статистику по всем сохранённым числам.

require_once __DIR__ . '/NumberStatistics.php';

$title = 'Статистика чисел (база данных)';
$note = 'Вводите положительные числа по одному. Введите 0, чтобы увидеть статистику по всем сохранённым числам.';

try {
    require __DIR__ . '/../DB.php'; // создаёт $pdo
    $store = new PdoStatisticsStore($pdo);
} catch (PDOException $e) {
    renderStatisticsPage($title, $note, [
        'message' => null,
        'error' => 'Нет подключения к базе данных: ' . $e->getMessage(),
        'summary' => null,
    ]);
    exit;
}

$result = isset($_POST['go'])
    ? handleNumberInput($store, (string)($_POST['number'] ?? ''), clearAfterSummary: false)
    : null;

$list = '';
if ($result['summary'] ?? null) {
    $list = '<p>Сохранённые числа: ' . h(implode(', ', array_column($store->numbers(), 'number'))) . '</p>';
}

renderStatisticsPage($title, $note, $result, $list);
