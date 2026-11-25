<?php

declare(strict_types=1);

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/SimpleAlgoritms.php';

/** @param list<list<int>> $matrix */
function printMatrix(array $matrix): void
{
    echo '<table class="table table-bordered table-condensed" style="width: auto">';
    foreach ($matrix as $row) {
        echo '<tr><td>', implode('</td><td>', $row), '</td></tr>';
    }
    echo '</table>';
}

$date = trim((string)($_POST['date'] ?? ''));

pageHeader('Простые алгоритмы');
?>
<h4>Задача 1. Числа от A до B (A = 2, B = 5)</h4>
<pre><?= implode("\n", SimpleAlgoritms::repeatedNumbers(2, 5)) ?></pre>
<pre><?= implode("\n", SimpleAlgoritms::numberPyramid(2, 5)) ?></pre>

<h4>Дата в формате ДДММГГ</h4>
<p>Если год больше или равен 30 — это 19xx, иначе 20xx.</p>
<form method="post" class="form-inline">
    <input type="text" name="date" class="form-control" placeholder="140319" value="<?= h($date) ?>">
    <button type="submit" class="btn btn-default">Проверить</button>
</form>
<table class="table table-bordered" style="width: auto">
    <?php foreach (array_filter([$date, '140319', '031276', '290200', '290201', '670190', '202093']) as $value):
        $parsed = SimpleAlgoritms::parseDate($value); ?>
        <tr>
            <td><?= h($value) ?></td>
            <td><?= $parsed ? SimpleAlgoritms::formatNumeric($parsed) : 'Incorrect date' ?></td>
            <td><?= $parsed ? SimpleAlgoritms::formatWithMonthName($parsed) : '' ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h4>Матрица 9×9, транспонированная и «змейкой»</h4>
<?php
$matrix = SimpleAlgoritms::matrix(9);
printMatrix($matrix);
printMatrix(SimpleAlgoritms::transpose($matrix));
printMatrix(SimpleAlgoritms::snakeColumns($matrix));
?>

<h4>Диагонали квадрата 15×15</h4>
<pre><?= implode("\n", SimpleAlgoritms::diagonalCross(15)) ?></pre>

<h4>Разное</h4>
<?php $numbers = [3, 7, 15, 1, 292, 1, 1, 1, 2, 1, 3, 1, 14, 2, 1, 1, 2, 2, 2, 2, 1, 84, 2, 1, 1]; ?>
<p>Массив: <?= implode(' ', $numbers) ?><br>
    Максимум: <?= SimpleAlgoritms::maxElement($numbers) ?>, минимум: <?= SimpleAlgoritms::minElement($numbers) ?></p>
<p>
    <?php foreach ([[1, 2, 0], [13, 267, 38], [19, 12, 90]] as [$a, $b, $c]): ?>
        <?= "$a, $b, $c" ?> — <?= SimpleAlgoritms::hasTwoEven($a, $b, $c) ? 'есть два чётных числа' : 'нет двух чётных чисел' ?><br>
    <?php endforeach; ?>
</p>
<p>1 + x²/2! + x⁴/4! + … при x = 5.3, n = 20: <?= round(SimpleAlgoritms::evenPowerSeries(5.3, 20), 6) ?>
    (ch 5.3 = <?= round(cosh(5.3), 6) ?>)</p>
<p>5! = <?= (new RecursivClass())->factorialLoop(5) ?></p>
<?php
pageFooter();
