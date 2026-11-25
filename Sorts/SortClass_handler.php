<?php

declare(strict_types=1);

// Задача 4: сортировка массива из sort.php + сравнение скорости алгоритмов сортировки.

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/SortClass.php';

/** @param list<array{string, int, int}> $rows */
function printRows(array $rows): void
{
    echo '<table class="table table-condensed"><tr><th>[0]</th><th>[1]</th><th>[2]</th><th>[1] + [2]</th></tr>';
    foreach ($rows as [$letter, $a, $b]) {
        printf('<tr><td>%s</td><td>%d</td><td>%d</td><td>%d</td></tr>', h($letter), $a, $b, $a + $b);
    }
    echo '</table>';
}

function isSorted(array $items, callable $cmp): bool
{
    for ($i = 1, $n = count($items); $i < $n; $i++) {
        if ($cmp($items[$i - 1], $items[$i]) > 0) {
            return false;
        }
    }

    return true;
}

$rows = require __DIR__ . '/sort.php';
$sorted = SortClass::sortTask($rows);

$algorithms = [
    'Пузырьком' => SortClass::bubbleSort(...),
    'Выбором' => SortClass::selectionSort(...),
    'Вставками' => SortClass::insertionSort(...),
    'Быстрая (Хоара)' => SortClass::quickSort(...),
];

$benchmarkSize = 900;
$randomRows = SortClass::randomRows($benchmarkSize);

pageHeader('Сортировка двумерного массива');
?>
<p>Пример из условия:</p>
<?php printRows(SortClass::sortTask([['g', 6, 3], ['f', 8, 6], ['a', 5, 3], ['f', 2, 5]])); ?>

<h4>Скорость алгоритмов на <?= $benchmarkSize ?> случайных строках</h4>
<table class="table table-bordered">
    <tr><th>Алгоритм</th><th>Время, мс</th><th>Отсортировано верно</th></tr>
    <?php foreach ($algorithms as $name => $sort):
        $time = hrtime(true);
        $result = $sort($randomRows, SortClass::compareTaskRows(...));
        $ms = (hrtime(true) - $time) / 1e6;
        ?>
        <tr>
            <td><?= h($name) ?></td>
            <td><?= number_format($ms, 2) ?></td>
            <td><?= isSorted($result, SortClass::compareTaskRows(...)) ? 'да' : '<b class="text-danger">нет</b>' ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h4>Массив из sort.php после сортировки (<?= count($sorted) ?> строк)</h4>
<?php printRows($sorted);
pageFooter();
