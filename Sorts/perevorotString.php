<?php

declare(strict_types=1);

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/PerevorotArray.php';

$text = 'Регистр букв: Hello World, привет мир';
$variants = PerevorotArray::caseVariants($text);

pageHeader('Упражнения со строками');
?>
<table class="table table-bordered">
    <tr><td>Исходный текст</td><td><?= h($variants['original']) ?></td></tr>
    <tr><td>Заглавными буквами</td><td><?= h($variants['upper']) ?></td></tr>
    <tr><td>Строчными буквами</td><td><?= h($variants['lower']) ?></td></tr>
    <tr><td>С большой буквы</td><td><?= h($variants['ucfirst']) ?></td></tr>
    <tr><td>Слова</td><td><?= h(implode(' | ', $variants['words'])) ?></td></tr>
    <tr><td>Сумма 150 первых членов гармонического ряда</td><td><?= round(PerevorotArray::harmonicSum(150), 6) ?></td></tr>
    <tr><td>17 первых чисел Фибоначчи</td><td><?= implode(' ', PerevorotArray::fibonacci(17)) ?></td></tr>
</table>

<h4>Переворот строки начиная с 13-го символа</h4>
<?php $sample = 'Обычно уведомления — это короткие информационные сообщения'; ?>
<p>Было: <?= h($sample) ?><br>Стало: <?= h(PerevorotArray::reverseFrom($sample, 13)) ?></p>
<?php
pageFooter();
