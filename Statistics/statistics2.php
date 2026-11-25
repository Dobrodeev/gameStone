<?php

declare(strict_types=1);

// Статистика введённых чисел с хранением в сессии.
// После вывода статистики (ввод 0) подсчёт начинается заново.

session_name('test');
session_start();

require_once __DIR__ . '/NumberStatistics.php';

$result = isset($_POST['go'])
    ? handleNumberInput(new SessionStatisticsStore(), (string)($_POST['number'] ?? ''), clearAfterSummary: true)
    : null;

renderStatisticsPage(
    'Статистика чисел (сессия)',
    'Вводите положительные числа по одному. Введите 0, чтобы увидеть статистику и начать заново.',
    $result,
);
