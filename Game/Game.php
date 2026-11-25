<?php

declare(strict_types=1);

// Случайное блуждание по карте: * — проходимая клетка, 0 — стена, # — игрок.
// Игрок делает случайный шаг каждый ход; шаг в стену или за край карты пропускается.

require_once __DIR__ . '/layout.php';

enum Direction
{
    case Up;
    case Down;
    case Left;
    case Right;

    /** @return array{int, int} смещение [dx, dy] */
    public function offset(): array
    {
        return match ($this) {
            self::Up => [0, -1],
            self::Down => [0, 1],
            self::Left => [-1, 0],
            self::Right => [1, 0],
        };
    }

    public static function random(): self
    {
        return self::cases()[array_rand(self::cases())];
    }
}

final readonly class Map
{
    private const string FLOOR = '*';
    private const string WALL = '0';

    /** @param list<list<string>> $cells */
    private function __construct(private array $cells)
    {
    }

    /** Карта, где каждая клетка — стена с вероятностью 1/6. */
    public static function generate(int $width, int $height): self
    {
        $cells = [];
        for ($y = 0; $y < $height; $y++) {
            for ($x = 0; $x < $width; $x++) {
                $cells[$y][$x] = random_int(0, 5) === 0 ? self::WALL : self::FLOOR;
            }
        }

        return new self($cells);
    }

    public function width(): int
    {
        return count($this->cells[0]);
    }

    public function height(): int
    {
        return count($this->cells);
    }

    public function isWalkable(int $x, int $y): bool
    {
        return ($this->cells[$y][$x] ?? self::WALL) === self::FLOOR;
    }

    public function render(int $playerX, int $playerY): string
    {
        $rows = [];
        foreach ($this->cells as $y => $row) {
            $line = $row;
            if ($y === $playerY) {
                $line[$playerX] = '#';
            }
            $rows[] = implode('', $line);
        }

        return implode("\n", $rows);
    }
}

$map = Map::generate(10, 10);
$x = random_int(0, $map->width() - 1);
$y = random_int(0, $map->height() - 1);
$moves = 45;

pageHeader('Случайное блуждание по карте');
echo '<h3>Случайное блуждание по карте</h3><pre>', $map->render($x, $y), '</pre>';

for ($turn = 1; $turn <= $moves; $turn++) {
    $direction = Direction::random();
    [$dx, $dy] = $direction->offset();
    $moved = $map->isWalkable($x + $dx, $y + $dy);
    if ($moved) {
        [$x, $y] = [$x + $dx, $y + $dy];
    }
    printf('<p>Ход %d: %s%s</p><pre>%s</pre>', $turn, $direction->name, $moved ? '' : ' — нельзя', $map->render($x, $y));
}

pageFooter();
