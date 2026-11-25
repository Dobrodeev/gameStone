<?php

declare(strict_types=1);

// Крестики-нолики: человек против человека, игроки ходят по очереди.

require_once __DIR__ . '/TicTac.php';

renderTicTacPage('Крестики-нолики: два игрока', 'twoPlayers', static function (): void {
});
