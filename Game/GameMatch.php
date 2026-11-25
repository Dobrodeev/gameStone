<?php

declare(strict_types=1);

require_once __DIR__ . '/Figure.php';

/**
 * Матч «игрок против компьютера» из ROUNDS раундов. Счёт хранится в сессии между запросами.
 * Победа — 1 очко, ничья — по 0.5 очка обоим.
 */
final class GameMatch
{
    public const int ROUNDS = 6;
    private const string SESSION_KEY = 'figureGame';

    private function __construct(
        public private(set) int $round = 0,
        public private(set) float $userScore = 0,
        public private(set) float $botScore = 0,
    ) {
    }

    public static function load(): self
    {
        $state = $_SESSION[self::SESSION_KEY] ?? [];

        return new self($state['round'] ?? 0, $state['user'] ?? 0, $state['bot'] ?? 0);
    }

    public static function reset(): void
    {
        unset($_SESSION[self::SESSION_KEY]);
    }

    public function isOver(): bool
    {
        return $this->round >= self::ROUNDS;
    }

    /** Сыграть раунд: возвращает результат для игрока (1, 0, -1). */
    public function play(Figure $user, Figure $bot): int
    {
        if ($this->isOver()) {
            throw new LogicException('Матч уже закончен');
        }

        $result = $user->against($bot);
        match ($result) {
            1 => $this->userScore += 1,
            -1 => $this->botScore += 1,
            0 => [$this->userScore += 0.5, $this->botScore += 0.5],
        };
        $this->round++;
        $this->save();

        return $result;
    }

    public function winner(): string
    {
        return match ($this->userScore <=> $this->botScore) {
            1 => 'Вы выиграли матч!',
            -1 => 'Компьютер выиграл матч',
            0 => 'Ничья',
        };
    }

    private function save(): void
    {
        $_SESSION[self::SESSION_KEY] = ['round' => $this->round, 'user' => $this->userScore, 'bot' => $this->botScore];
    }
}
