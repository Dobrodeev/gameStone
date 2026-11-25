<?php

declare(strict_types=1);

/**
 * Товар магазина: автор, название, цена и скидка.
 * Конкретные виды товаров (книга, CD) наследуют этот класс и дополняют описание.
 */
abstract class ShopProduct implements Stringable
{
    /** Скидка в денежных единицах, не больше цены. */
    public private(set) float $discount = 0.0;

    public function __construct(
        public readonly string $title,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly float $price,
    ) {
        if ($price < 0) {
            throw new InvalidArgumentException('Цена не может быть отрицательной');
        }
    }

    public function setDiscount(float $discount): void
    {
        if ($discount < 0 || $discount > $this->price) {
            throw new InvalidArgumentException("Скидка должна быть от 0 до {$this->price}");
        }
        $this->discount = $discount;
    }

    /** Цена с учётом скидки. */
    public function getPrice(): float
    {
        return $this->price - $this->discount;
    }

    /** Имя и фамилия автора. */
    public function getProducer(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }

    /** Краткое описание: «Название (Автор)» + особенности конкретного вида товара. */
    public function getSummary(): string
    {
        return "«{$this->title}» ({$this->getProducer()})";
    }

    public function __toString(): string
    {
        return $this->getSummary();
    }
}
