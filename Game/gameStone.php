<?php

declare(strict_types=1);

// Игра «Ножницы, бумага, колодец»: выбор фигуры.

session_start();

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/GameMatch.php';

if (isset($_GET['new'])) {
    GameMatch::reset();
}
$match = GameMatch::load();

pageHeader('Ножницы, бумага, колодец');
?>
<h3>Ножницы, бумага, колодец</h3>
<p>Ножницы режут бумагу, бумага накрывает колодец, ножницы падают в колодец.
    Матч из <?= GameMatch::ROUNDS ?> раундов.</p>
<?php if ($match->isOver()): ?>
    <p>Матч закончен. <a href="?new=1">Начать новый</a></p>
<?php else: ?>
    <p>Раунд <?= $match->round + 1 ?> из <?= GameMatch::ROUNDS ?>.
        Счёт: вы <?= $match->userScore ?> — компьютер <?= $match->botScore ?></p>
    <form method="post" action="scriptGame.php" class="form-inline">
        <select name="variant" class="form-control">
            <?php foreach (Figure::cases() as $figure): ?>
                <option value="<?= $figure->value ?>" <?= $figure === Figure::Well ? 'selected' : '' ?>>
                    <?= h($figure->label()) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Сыграть</button>
    </form>
<?php endif;
pageFooter();
