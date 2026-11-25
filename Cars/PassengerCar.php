<?php

declare(strict_types=1);

require_once __DIR__ . '/Wheel.php';

/**
 * Легковой автомобиль: кузов (цвет, скорость) и колёса класса Wheel.
 */
final class PassengerCar implements Stringable
{
    /** @var list<Wheel> */
    public readonly array $wheels;

    public private(set) float $speed;

    public function __construct(
        public string $color = 'Grey',
        float $speed = 0,
        int $wheelCount = 4,
        public ?int $year = null,
    ) {
        $this->speed = max($speed, 0);
        $this->wheels = array_map(fn() => new Wheel($this), range(1, $wheelCount));
    }

    public function accelerate(float $delta): void
    {
        $this->speed = max($this->speed + $delta, 0);
    }

    public function slowDown(float $factor): void
    {
        $this->speed /= $factor;
    }

    public function stop(): void
    {
        $this->speed = 0;
    }

    public function __toString(): string
    {
        return "This is {$this->color} car with speed = {$this->speed}!";
    }
}
