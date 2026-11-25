<?php

declare(strict_types=1);

// Крестики-нолики: человек (X) против бота (O). После каждого хода человека сразу ходит бот.

require_once __DIR__ . '/TicTac.php';

renderTicTacPage('Крестики-нолики: против компьютера', 'vsBot', static function (TicTac $game): void {
    if (!$game->isOver()) {
        $game->playBot();
    }
});
