<?php

declare(strict_types=1);

// Сортировки одномерного массива чисел и задача «сначала чётные, потом нечётные».

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/SortClass.php';

$years = [1991, 1941, 1994, 1989, 1945, 1966, 1976, 1939, 1933, 1982];

pageHeader('Сортировки массива чисел');

echo '<p>Исходный массив:</p>';
printList($years);

foreach (
    [
        'Пузырьком' => SortClass::bubbleSort(...),
        'Выбором' => SortClass::selectionSort(...),
        'Вставками' => SortClass::insertionSort(...),
        'Быстрая (Хоара)' => SortClass::quickSort(...),
    ] as $name => $sort
) {
    $shuffled = $years;
    shuffle($shuffled);
    echo '<p><b>', h($name), '</b>. Перемешали: ', implode(' ', $shuffled), '<br>Отсортировали: ';
    printList($sort($shuffled));
    echo '</p>';
}
?>
<h4>Сначала чётные, затем нечётные</h4>
<p>Дан массив чисел. Отсортировать его так, чтобы сначала шли все чётные, затем все нечётные,
    а порядок элементов внутри чётных и нечётных сохранялся как в исходном массиве.</p>
<?php
$shuffled = $years;
shuffle($shuffled);
echo 'Исходный: ';
printList($shuffled);
echo 'С сохранением порядка: ';
printList(SortClass::evenThenOdd($shuffled));
echo 'За один проход без сохранения порядка: ';
printList(SortClass::evenThenOddUnstable($shuffled));

pageFooter();
