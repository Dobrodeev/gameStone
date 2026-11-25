<?php

declare(strict_types=1);

/*
 * Задача про стоянку. На вход подаются записи вида «ЧЧ:ММ * НОМЕР»:
 *   7:00 * CAR1  → прибытие
 *   7:10 * CAR2  → прибытие
 *   7:20 * CAR1  → отбытие, всего на стоянке 0:20
 *   7:33 * CAR2  → отбытие, всего на стоянке 0:23
 * Если машины нет на стоянке — она заезжает, если стоит — уезжает.
 * Для каждой машины считается общее время стоянки. Время не может идти назад.
 * Состояние стоянки хранится в сессии.
 */

session_start();

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/CarOnParking.php';

if (isset($_POST['reset'])) {
    unset($_SESSION['parking']);
}

$parking = Parking::fromArray($_SESSION['parking'] ?? []);
$message = null;
$error = null;

if (isset($_POST['go'])) {
    try {
        $message = $parking->register((string)($_POST['entry'] ?? ''));
        $_SESSION['parking'] = $parking->toArray();
    } catch (InvalidArgumentException $e) {
        $error = $e->getMessage();
    }
}

pageHeader('Стоянка');
?>
<form method="post" class="form-inline">
    <input class="form-control" type="text" placeholder="7:00 * AA1991AI" name="entry" autofocus>
    <button type="submit" class="btn btn-primary" name="go">Записать</button>
    <button type="submit" class="btn btn-default" name="reset">Очистить журнал</button>
</form>
<?php if ($message !== null): ?>
    <p class="text-info"><?= h($message) ?></p>
<?php endif; ?>
<?php if ($error !== null): ?>
    <p class="text-danger"><?= h($error) ?></p>
<?php endif; ?>

<?php if ($parking->cars() !== []): ?>
    <table class="table table-bordered" style="width: auto">
        <tr><th>Номер</th><th>Сейчас</th><th>Всего на стоянке</th></tr>
        <?php foreach ($parking->cars() as $car): ?>
            <tr>
                <td><?= h($car->number) ?></td>
                <td><?= $car->onParking ? 'на стоянке с ' . Parking::formatTime((int)$car->arrivedAt) : 'уехала' ?></td>
                <td><?= Parking::formatTime($car->totalMinutes) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif;
pageFooter();
