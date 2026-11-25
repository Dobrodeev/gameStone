<?php

declare(strict_types=1);

function h(string|int|float|Stringable $value): string
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
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
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
