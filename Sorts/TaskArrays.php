<?php

declare(strict_types=1);

/**
 * Упражнения с одномерным массивом чисел.
 * Номера элементов считаются с 1.
 */
final readonly class TaskArrays
{
    /** @param list<int|float> $numbers */
    public function __construct(private array $numbers)
    {
        if ($numbers === []) {
            throw new InvalidArgumentException('Массив не должен быть пустым');
        }
    }

    /**
     * Все результаты упражнений: название => значение.
     *
     * @return array<string, int|float|string>
     */
    public function exercises(): array
    {
        $positive = $this->filter(static fn($n) => $n > 0);
        $negative = $this->filter(static fn($n) => $n < 0);
        $min = min($this->numbers);
        $max = max($this->numbers);

        return [
            'Максимальный элемент' => $max,
            'Минимальный элемент' => $min,
            'Номер максимального элемента' => $this->positionsOf($max),
            'Номер минимального элемента' => $this->positionsOf($min),
            'Сумма положительных элементов' => array_sum($positive),
            'Сумма отрицательных элементов' => array_sum($negative),
            'Произведение положительных элементов' => array_product($positive),
            'Произведение отрицательных элементов' => array_product($negative),
            'Количество положительных элементов' => count($positive),
            'Количество отрицательных элементов' => count($negative),
            'Произведение номеров положительных элементов' => array_product(array_keys($positive)),
            'Произведение номеров отрицательных элементов' => array_product(array_keys($negative)),
            'Среднее арифметическое' => round(array_sum($this->numbers) / count($this->numbers), 2),
            'Элементы больше 5' => $this->join(static fn($n) => $n > 5),
            'Элементы меньше 10' => $this->join(static fn($n) => $n < 10),
            'Элементы 0 < x < 6' => $this->join(static fn($n) => $n > 0 && $n < 6),
            'Вторая половина массива' => implode(' ', array_slice($this->numbers, intdiv(count($this->numbers), 2))),
        ];
    }

    /** Элементы, подходящие под условие, с ключами — номерами элементов (с 1). */
    private function filter(callable $condition): array
    {
        $numbered = array_combine(range(1, count($this->numbers)), $this->numbers);

        return array_filter($numbered, $condition);
    }

    private function join(callable $condition): string
    {
        return implode(' ', $this->filter($condition));
    }

    private function positionsOf(int|float $value): string
    {
        return implode(', ', array_keys($this->filter(static fn($n) => $n === $value)));
    }
}
