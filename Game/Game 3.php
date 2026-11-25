<?php

declare(strict_types=1);

// Турнир «Ножницы, бумага, колодец»: от 4 до 10 игроков, в каждом раунде играют двое случайных.
// Турнир идёт, пока кто-нибудь не наберёт WINS_TO_FINISH побед.

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/Figure.php';

const WINS_TO_FINISH = 7;

/** @var array<string, int> $wins имя игрока => количество побед */
$wins = [];
foreach (range(1, random_int(4, 10)) as $n) {
    $wins["Player{$n}"] = 0;
}

pageHeader('Турнир');
echo '<h3>Турнир до ', WINS_TO_FINISH, ' побед, игроков: ', count($wins), '</h3>';

$round = 0;
while (max($wins) < WINS_TO_FINISH) {
    $round++;
    [$player1, $player2] = array_rand($wins, 2);
    $figure1 = Figure::random();
    $figure2 = Figure::random();

    $result = match ($figure1->against($figure2)) {
        1 => $player1,
        -1 => $player2,
        0 => null,
    };
    if ($result !== null) {
        $wins[$result]++;
    }

    printf(
        '<p><b>Раунд %d</b>: %s (%s) vs %s (%s) — %s</p>',
        $round,
        h($player1),
        h($figure1->label()),
        h($player2),
        h($figure2->label()),
        $result === null ? 'ничья' : 'победил ' . h($result),
    );
}

arsort($wins);
echo '<h4>Итог: победитель — ', h(array_key_first($wins)), ' за ', $round, ' раундов</h4>';
echo '<table class="table table-bordered" style="width: auto"><tr><th>Игрок</th><th>Победы</th></tr>';
foreach ($wins as $player => $count) {
    printf('<tr><td>%s</td><td>%d</td></tr>', h($player), $count);
}
echo '</table>';

pageFooter();
