<?php

declare(strict_types=1);

/**
 * Крестики-нолики на поле 3×3.
 *
 * Порядок игры: пустое поле → ход крестиков → проверка победы/ничьей → ход ноликов → ...
 * Победа — три одинаковые фигуры в строке, столбце или по диагонали.
 * Режимы: человек против человека (TicTacForm.php) и человек против бота (TicTacObject.php).
 */

enum Mark: string
{
    case X = 'X';
    case O = 'O';

    public function opponent(): self
    {
        return $this === self::X ? self::O : self::X;
    }

    public function label(): string
    {
        return $this === self::X ? 'Крестики' : 'Нолики';
    }
}

/** Игровое поле. Клетка — либо Mark, либо null (пусто). */
final class Board
{
    public const int SIZE = 3;

    /** Все 8 выигрышных линий: 3 строки, 3 столбца, 2 диагонали. */
    private const array LINES = [
        [[0, 0], [0, 1], [0, 2]], [[1, 0], [1, 1], [1, 2]], [[2, 0], [2, 1], [2, 2]],
        [[0, 0], [1, 0], [2, 0]], [[0, 1], [1, 1], [2, 1]], [[0, 2], [1, 2], [2, 2]],
        [[0, 0], [1, 1], [2, 2]], [[0, 2], [1, 1], [2, 0]],
    ];

    /** @param array<int, array<int, ?Mark>> $cells */
    private function __construct(private array $cells)
    {
    }

    public static function empty(): self
    {
        return new self(array_fill(0, self::SIZE, array_fill(0, self::SIZE, null)));
    }

    public function get(int $row, int $col): ?Mark
    {
        return $this->cells[$row][$col];
    }

    public function place(int $row, int $col, Mark $mark): void
    {
        if (!isset($this->cells[$row]) || !array_key_exists($col, $this->cells[$row])) {
            throw new InvalidArgumentException("Клетки ({$row}, {$col}) нет на поле");
        }
        if ($this->cells[$row][$col] !== null) {
            throw new InvalidArgumentException('Это поле уже занято. Сделайте другой ход.');
        }
        $this->cells[$row][$col] = $mark;
    }

    public function winner(): ?Mark
    {
        foreach (self::LINES as [[$r1, $c1], [$r2, $c2], [$r3, $c3]]) {
            $mark = $this->cells[$r1][$c1];
            if ($mark !== null && $mark === $this->cells[$r2][$c2] && $mark === $this->cells[$r3][$c3]) {
                return $mark;
            }
        }

        return null;
    }

    /** @return list<array{int, int}> свободные клетки [строка, столбец] */
    public function freeCells(): array
    {
        $free = [];
        foreach ($this->cells as $row => $cols) {
            foreach ($cols as $col => $mark) {
                if ($mark === null) {
                    $free[] = [$row, $col];
                }
            }
        }

        return $free;
    }

    public function isFull(): bool
    {
        return $this->freeCells() === [];
    }

    /** @return list<list<?string>> для хранения в сессии */
    public function toArray(): array
    {
        return array_map(static fn(array $row): array => array_map(static fn(?Mark $m): ?string => $m?->value, $row), $this->cells);
    }

    public static function fromArray(array $data): self
    {
        return new self(array_map(static fn(array $row): array => array_map(static fn(?string $v): ?Mark => $v === null ? null : Mark::from($v), $row), $data));
    }

    /** Копия поля с ходом — нужна боту, чтобы «примерить» ход. */
    public function with(int $row, int $col, Mark $mark): self
    {
        $copy = clone $this;
        $copy->place($row, $col, $mark);

        return $copy;
    }
}

/** Партия: поле, чей ход и номер хода. Состояние хранится в сессии под своим ключом. */
final class TicTac
{
    private function __construct(
        private readonly string $sessionKey,
        public private(set) Board $board,
        public private(set) Mark $turn,
        public private(set) int $moves,
    ) {
    }

    public static function load(string $sessionKey): self
    {
        $state = $_SESSION[$sessionKey] ?? null;

        return $state === null
            ? new self($sessionKey, Board::empty(), Mark::X, 0)
            : new self($sessionKey, Board::fromArray($state['board']), Mark::from($state['turn']), $state['moves']);
    }

    public function restart(): void
    {
        unset($_SESSION[$this->sessionKey]);
        [$this->board, $this->turn, $this->moves] = [Board::empty(), Mark::X, 0];
    }

    public function isOver(): bool
    {
        return $this->board->winner() !== null || $this->board->isFull();
    }

    /** @throws InvalidArgumentException если клетка занята или игра окончена */
    public function play(int $row, int $col): void
    {
        if ($this->isOver()) {
            throw new InvalidArgumentException('Игра окончена. Начните новую.');
        }
        $this->board->place($row, $col, $this->turn);
        $this->moves++;
        $this->turn = $this->turn->opponent();
        $this->save();
    }

    /**
     * Ход бота: выиграть, если можно; иначе помешать выиграть сопернику;
     * иначе занять центр; иначе — случайная свободная клетка.
     */
    public function playBot(): void
    {
        $free = $this->board->freeCells();
        $winningMove = fn(Mark $mark): ?array => array_find(
            $free,
            fn(array $cell): bool => $this->board->with($cell[0], $cell[1], $mark)->winner() === $mark,
        );

        [$row, $col] = $winningMove($this->turn)
            ?? $winningMove($this->turn->opponent())
            ?? (in_array([1, 1], $free, true) ? [1, 1] : $free[array_rand($free)]);

        $this->play($row, $col);
    }

    public function status(): string
    {
        return match (true) {
            ($winner = $this->board->winner()) !== null => "{$winner->label()} победили!",
            $this->board->isFull() => 'Ничья — все клетки заняты.',
            default => "Ход №" . ($this->moves + 1) . ": ходят {$this->turn->label()} ({$this->turn->value})",
        };
    }

    private function save(): void
    {
        $_SESSION[$this->sessionKey] = [
            'board' => $this->board->toArray(),
            'turn' => $this->turn->value,
            'moves' => $this->moves,
        ];
    }
}

/**
 * Общая страница игры. Клетка поля — кнопка, которая отправляет свои координаты.
 *
 * @param callable(TicTac, int, int): void $onMove что делать после хода человека (например, ход бота)
 */
function renderTicTacPage(string $title, string $sessionKey, callable $onMove): void
{
    session_name('TicTac');
    session_start();

    $game = TicTac::load($sessionKey);
    $error = null;

    if (isset($_POST['restart'])) {
        $game->restart();
    } elseif (isset($_POST['cell']) && preg_match('/^([0-2]),([0-2])$/', (string)$_POST['cell'], $m)) {
        try {
            $game->play((int)$m[1], (int)$m[2]);
            $onMove($game, (int)$m[1], (int)$m[2]);
        } catch (InvalidArgumentException $e) {
            $error = $e->getMessage();
        }
    }

    $h = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES);
    ?>
    <!doctype html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $h($title) ?></title>
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <style>
            .board td { width: 70px; height: 70px; padding: 0; }
            .board button { width: 100%; height: 100%; font-size: 32px; font-weight: bold; }
        </style>
    </head>
    <body>
    <div class="container">
        <h3><?= $h($title) ?></h3>
        <p><b><?= $h($game->status()) ?></b></p>
        <?php if ($error !== null): ?>
            <p class="text-danger"><?= $h($error) ?></p>
        <?php endif; ?>
        <form method="post">
            <table class="table table-bordered board" style="width: auto">
                <?php for ($row = 0; $row < Board::SIZE; $row++): ?>
                    <tr>
                        <?php for ($col = 0; $col < Board::SIZE; $col++):
                            $mark = $game->board->get($row, $col); ?>
                            <td>
                                <button type="submit" name="cell" value="<?= "{$row},{$col}" ?>" class="btn btn-default"
                                    <?= $mark !== null || $game->isOver() ? 'disabled' : '' ?>><?= $mark?->value ?? '&nbsp;' ?></button>
                            </td>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </table>
            <button type="submit" name="restart" class="btn btn-primary">Новая игра</button>
        </form>
    </div>
    <script src="../assets/jquery-3.2.1.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    </body>
    </html>
    <?php
}
