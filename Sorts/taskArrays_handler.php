<?php

declare(strict_types=1);

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/TaskArrays.php';

$numbers = [9, -13, 26, -3, 19, 29, 3, 27, -20, 18, -17];

pageHeader('Упражнения с массивом');

echo '<p>Массив: ';
printList($numbers);
echo '</p><table class="table table-bordered">';
foreach ((new TaskArrays($numbers))->exercises() as $name => $value) {
    printf('<tr><td>%s</td><td>%s</td></tr>', h($name), h($value));
}
echo '</table>';

pageFooter();
