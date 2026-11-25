<?php

declare(strict_types=1);

/**
 * Машина на стоянке: стоит ли сейчас, когда заехала и сколько всего простояла (в минутах).
 */
final class CarOnParking
{
    public function __construct(
        public readonly string $number,
        public private(set) bool $onParking = false,
        public private(set) ?int $arrivedAt = null,
        public private(set) int $totalMinutes = 0,
    ) {
    }

    public function arrive(int $minute): void
    {
        $this->onParking = true;
        $this->arrivedAt = $minute;
    }

    /** Отъезд: возвращает, сколько минут длилась эта стоянка. */
    public function depart(int $minute): int
    {
        $stay = $minute - (int)$this->arrivedAt;
        $this->totalMinutes += $stay;
        $this->onParking = false;
        $this->arrivedAt = null;

        return $stay;
    }

    /** @return array{number: string, onParking: bool, arrivedAt: ?int, totalMinutes: int} */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public static function fromArray(array $data): self
    {
        return new self($data['number'], $data['onParking'], $data['arrivedAt'], $data['totalMinutes']);
    }
}

/**
 * Журнал стоянки. Каждая запись — «ЧЧ:ММ * НОМЕР»: если машины нет на стоянке, она заезжает,
 * если стоит — уезжает, и к её общему времени добавляется время стоянки.
 * Время в журнале не может идти назад.
 */
final class Parking
{
    /** @param array<string, CarOnParking> $cars */
    private function __construct(
        private array $cars = [],
        private ?int $lastMinute = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            array_map(CarOnParking::fromArray(...), $data['cars'] ?? []),
            $data['lastMinute'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'cars' => array_map(static fn(CarOnParking $car): array => $car->toArray(), $this->cars),
            'lastMinute' => $this->lastMinute,
        ];
    }

    /** Обработка записи журнала. Возвращает сообщение о том, что произошло. */
    public function register(string $entry): string
    {
        if (!preg_match('/^\s*(\d{1,2}):(\d{2})\s*\*\s*([\p{L}\d]+)\s*$/u', $entry, $m)) {
            throw new InvalidArgumentException('Формат записи: ЧЧ:ММ * НОМЕР, например 7:00 * AA1991AI');
        }
        [, $hours, $minutes, $number] = $m;
        if ((int)$hours > 23 || (int)$minutes > 59) {
            throw new InvalidArgumentException("Некорректное время {$hours}:{$minutes}");
        }

        $minute = (int)$hours * 60 + (int)$minutes;
        if ($this->lastMinute !== null && $minute < $this->lastMinute) {
            throw new InvalidArgumentException(
                'Время не может идти назад: последняя запись была в ' . self::formatTime($this->lastMinute),
            );
        }
        $this->lastMinute = $minute;

        $number = mb_strtoupper($number);
        $car = $this->cars[$number] ??= new CarOnParking($number);

        if (!$car->onParking) {
            $car->arrive($minute);

            return "{$number} — прибытие";
        }

        $stay = $car->depart($minute);

        return sprintf(
            '%s — отбытие, эта стоянка: %s, всего на стоянке: %s',
            $number,
            self::formatTime($stay),
            self::formatTime($car->totalMinutes),
        );
    }

    /** @return array<string, CarOnParking> */
    public function cars(): array
    {
        return $this->cars;
    }

    /** 80 минут → «1:20» */
    public static function formatTime(int $minutes): string
    {
        return sprintf('%d:%02d', intdiv($minutes, 60), $minutes % 60);
    }
}
