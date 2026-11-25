<?php

declare(strict_types=1);

require_once __DIR__ . '/ShopProduct.php';

/** Музыкальный диск: дополнительно хранит длительность звучания в минутах. */
final class CDproduct extends ShopProduct
{
    public function __construct(
        string $title,
        string $firstName,
        string $lastName,
        float $price,
        public readonly int $playLength,
    ) {
        parent::__construct($title, $firstName, $lastName, $price);
    }

    #[\Override]
    public function getSummary(): string
    {
        return parent::getSummary() . ", длительность: {$this->playLength} мин";
    }
}
