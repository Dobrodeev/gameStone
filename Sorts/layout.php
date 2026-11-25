<?php

declare(strict_types=1);

/**
 * Общая разметка страниц заданий в папке Sorts.
 */

/** Экранирование значения для вывода в HTML. */
function h(string|int|float $value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES);
}

function pageHeader(string $title): void
{
    echo <<<HTML
        <!doctype html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>{$title}</title>
            <link href="../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        </head>
        <body>
        <div class="container">
        <h3>{$title}</h3>

        HTML;
}

function pageFooter(): void
{
    echo <<<HTML

        </div>
        <script src="../assets/jquery-3.2.1.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        </body>
        </html>
        HTML;
}

/** Вывод одномерного массива в строку через пробел. */
function printList(iterable $items): void
{
    $parts = [];
    foreach ($items as $item) {
        $parts[] = h($item);
    }
    echo implode(' ', $parts), '<br>';
}
