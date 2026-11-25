<?php

declare(strict_types=1);

// Пример использования классов товаров: наследование и переопределение getSummary().

require_once __DIR__ . '/BookProduct.php';
require_once __DIR__ . '/CDproduct.php';

$h = static fn(mixed $value): string => htmlspecialchars((string)$value, ENT_QUOTES);
$money = static fn(float $amount): string => number_format($amount, 2, '.', ' ');

$book = new BookProduct('Iron World', 'Man', 'Surname', 167, pages: 87);
$book->setDiscount(0.5);
$cd = new CDproduct('Iron World', 'Man', 'Surname', 329, playLength: 46);

/** @var list<ShopProduct> $products */
$products = [$book, $cd];
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h3>Товары</h3>
    <table class="table table-bordered">
        <tr><th>Тип</th><th>Описание</th><th>Цена</th><th>Скидка</th><th>Итого</th></tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $h($product::class) ?></td>
                <td><?= $h($product) ?></td>
                <td><?= $money($product->price) ?></td>
                <td><?= $money($product->discount) ?></td>
                <td><?= $money($product->getPrice()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<script src="../assets/jquery-3.2.1.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
