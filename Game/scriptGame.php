<?php

declare(strict_types=1);

// Игра «Ножницы, бумага, колодец»: результат раунда.

session_start();

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/GameMatch.php';

$match = GameMatch::load();
$user = Figure::tryFrom((int)($_POST['variant'] ?? 0));

pageHeader('Результат раунда');
echo '<h3>Результат</h3>';

if ($user === null) {
    echo '<p class="text-danger">Выберите фигуру.</p>';
} elseif ($match->isOver()) {
    echo '<p>Матч уже закончен.</p>';
} else {
    $bot = Figure::random();
    $result = $match->play($user, $bot);
    ?>
    <p>Вы выбрали: <b><?= h($user->label()) ?></b></p>
    <p>Компьютер выбрал: <b><?= h($bot->label()) ?></b></p>
    <h4><?= match ($result) { 1 => 'Вы выиграли раунд', -1 => 'Компьютер выиграл раунд', 0 => 'Ничья' } ?></h4>
    <p>Раунд <?= $match->round ?> из <?= GameMatch::ROUNDS ?>.
        Счёт: вы <?= $match->userScore ?> — компьютер <?= $match->botScore ?></p>
    <?php
}

if ($match->isOver()) {
    echo '<h4>', h($match->winner()), '</h4><a href="gameStone.php?new=1">Новый матч</a>';
} else {
    echo '<a href="gameStone.php">Следующий раунд</a>';
}
pageFooter();
