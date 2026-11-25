<?php

declare(strict_types=1);

/*
 * Задача: пользователь по одному вводит положительные числа.
 * Когда он вводит 0 — вывести статистику: количество, сумму, минимум, максимум и среднее арифметическое.
 * Отрицательные числа — ошибка.
 */

/** Итоговая статистика по введённым числам. */
final readonly class Summary
{
    public function __construct(
        public int $count,
        public float $sum,
        public float $min,
        public float $max,
    ) {
    }

    public function average(): float
    {
        return $this->sum / $this->count;
    }

    /** @return array<string, string> подпись => значение */
    public function rows(): array
    {
        $format = static fn(float $n): string => rtrim(rtrim(number_format($n, 4, '.', ''), '0'), '.');

        return [
            'Количество чисел' => (string)$this->count,
            'Сумма' => $format($this->sum),
            'Минимум' => $format($this->min),
            'Максимум' => $format($this->max),
            'Среднее арифметическое' => $format($this->average()),
        ];
    }
}

/** Где хранятся введённые числа. */
interface StatisticsStore
{
    public function add(float $number): void;

    /** null — если чисел ещё нет. */
    public function summary(): ?Summary;

    public function clear(): void;
}

/** Хранение в сессии: числа не сохраняются, только накопленные count/sum/min/max. */
final class SessionStatisticsStore implements StatisticsStore
{
    public function __construct(private readonly string $key = 'numberStatistics')
    {
    }

    public function add(float $number): void
    {
        $current = $this->summary();
        $_SESSION[$this->key] = [
            'count' => ($current?->count ?? 0) + 1,
            'sum' => ($current?->sum ?? 0) + $number,
            'min' => min($current?->min ?? $number, $number),
            'max' => max($current?->max ?? $number, $number),
        ];
    }

    public function summary(): ?Summary
    {
        $data = $_SESSION[$this->key] ?? null;

        return $data === null ? null : new Summary($data['count'], $data['sum'], $data['min'], $data['max']);
    }

    public function clear(): void
    {
        unset($_SESSION[$this->key]);
    }
}

/**
 * Хранение в базе данных, таблица numbers_statistics (id, number).
 * Все запросы — подготовленные, значения не подставляются в текст SQL.
 */
final readonly class PdoStatisticsStore implements StatisticsStore
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(float $number): void
    {
        $this->pdo->prepare('INSERT INTO numbers_statistics (number) VALUES (?)')->execute([$number]);
    }

    public function summary(): ?Summary
    {
        $row = $this->pdo
            ->query('SELECT COUNT(number) AS cnt, SUM(number) AS total, MIN(number) AS mn, MAX(number) AS mx FROM numbers_statistics')
            ->fetch(PDO::FETCH_ASSOC);

        return (int)$row['cnt'] === 0
            ? null
            : new Summary((int)$row['cnt'], (float)$row['total'], (float)$row['mn'], (float)$row['mx']);
    }

    /** @return list<array{id: int, number: float}> */
    public function numbers(): array
    {
        return $this->pdo->query('SELECT id, number FROM numbers_statistics ORDER BY id')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function clear(): void
    {
        $this->pdo->exec('DELETE FROM numbers_statistics');
    }
}

/**
 * Обработка введённого значения.
 *
 * @return array{message: ?string, error: ?string, summary: ?Summary}
 */
function handleNumberInput(StatisticsStore $store, string $input, bool $clearAfterSummary): array
{
    $number = filter_var(str_replace(',', '.', trim($input)), FILTER_VALIDATE_FLOAT);

    return match (true) {
        $number === false => ['message' => null, 'error' => 'Введите число', 'summary' => null],
        $number < 0 => ['message' => null, 'error' => 'Число должно быть больше 0', 'summary' => null],
        $number > 0 => (static function () use ($store, $number): array {
            $store->add($number);

            return ['message' => "Добавлено число {$number}", 'error' => null, 'summary' => null];
        })(),
        default => (static function () use ($store, $clearAfterSummary): array {
            $summary = $store->summary();
            if ($summary !== null && $clearAfterSummary) {
                $store->clear();
            }

            return $summary === null
                ? ['message' => null, 'error' => 'Сначала введите хотя бы одно положительное число', 'summary' => null]
                : ['message' => null, 'error' => null, 'summary' => $summary];
        })(),
    };
}

function h(string|int|float $value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES);
}

/** @param array{message: ?string, error: ?string, summary: ?Summary}|null $result */
function renderStatisticsPage(string $title, string $note, ?array $result, string $extraHtml = ''): void
{
    ?>
    <!doctype html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= h($title) ?></title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <h3><?= h($title) ?></h3>
        <p><?= h($note) ?></p>
        <form method="post" class="form-inline">
            <input class="form-control" type="text" placeholder="положительное число или 0" name="number" autofocus>
            <button type="submit" class="btn btn-primary" name="go">Отправить</button>
        </form>
        <?php if ($result['message'] ?? null): ?>
            <p class="text-info"><?= h($result['message']) ?></p>
        <?php endif; ?>
        <?php if ($result['error'] ?? null): ?>
            <p class="text-danger"><?= h($result['error']) ?></p>
        <?php endif; ?>
        <?php if ($result['summary'] ?? null): ?>
            <table class="table table-bordered" style="width: auto">
                <?php foreach ($result['summary']->rows() as $label => $value): ?>
                    <tr><td><?= h($label) ?></td><td><?= h($value) ?></td></tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <?= $extraHtml ?>
    </div>
    <script src="../assets/jquery-3.2.1.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}
