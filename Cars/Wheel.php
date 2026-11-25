<?php

declare(strict_types=1);

/**
 * Колесо автомобиля. Давление влияет на скорость машины-владельца:
 * 0 бар — машина останавливается, меньше 0.5 бар — скорость падает вдвое,
 * больше MAX_PRESSURE — колесо лопается (давление 0).
 */
final class Wheel
{
    public const float MAX_PRESSURE = 5.0;
    public const float LOW_PRESSURE = 0.5;

    public private(set) float $pressure;
    public private(set) bool $burst = false;

    public function __construct(
        private readonly ?PassengerCar $owner = null,
        float $pressure = 2.0,
        public readonly int $diameter = 13,
    ) {
        $this->pressure = $pressure;
    }

    public function setPressure(float $pressure): void
    {
        $this->burst = $pressure > self::MAX_PRESSURE;
        $this->pressure = $this->burst ? 0.0 : max($pressure, 0.0);

        match (true) {
            $this->pressure == 0.0 => $this->owner?->stop(),
            $this->pressure < self::LOW_PRESSURE => $this->owner?->slowDown(2),
            default => null,
        };
    }
}
