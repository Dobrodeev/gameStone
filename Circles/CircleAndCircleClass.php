<?php

declare(strict_types=1);

/** Сколько точек пересечения у двух окружностей. */
enum Intersection
{
    case None;
    case One;
    case Two;
    case Infinite;

    public function label(): string
    {
        return match ($this) {
            self::None => '0 — окружности не пересекаются',
            self::One => '1 — окружности касаются',
            self::Two => '2 — окружности пересекаются',
            self::Infinite => 'бесконечно много — окружности совпадают',
        };
    }
}

/**
 * Окружность: центр (x, y) и радиус r.
 */
final readonly class CircleAndCircleClass
{
    /** Погрешность сравнения дробных чисел (корень даёт неточный результат). */
    private const float EPSILON = 1e-9;

    public function __construct(
        public float $x,
        public float $y,
        public float $r,
    ) {
        if ($r <= 0) {
            throw new InvalidArgumentException('Радиус должен быть больше нуля');
        }
    }

    /**
     * Пусть d — расстояние между центрами:
     *  - d = 0 и радиусы равны   → окружности совпадают;
     *  - d > r1 + r2             → одна вне другой, пересечений нет;
     *  - d < |r1 − r2|           → одна внутри другой, пересечений нет;
     *  - d = r1 + r2 или |r1 − r2| → касание, одна точка;
     *  - иначе                   → две точки.
     */
    public function countIntersections(self $other): Intersection
    {
        $distance = hypot($this->x - $other->x, $this->y - $other->y);
        $sum = $this->r + $other->r;
        $difference = abs($this->r - $other->r);
        $equals = static fn(float $a, float $b): bool => abs($a - $b) < self::EPSILON;

        return match (true) {
            $equals($distance, 0) && $equals($difference, 0) => Intersection::Infinite,
            $distance > $sum + self::EPSILON, $distance < $difference - self::EPSILON => Intersection::None,
            $equals($distance, $sum), $equals($distance, $difference) => Intersection::One,
            default => Intersection::Two,
        };
    }
}
