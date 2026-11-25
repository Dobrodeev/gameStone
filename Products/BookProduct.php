<?php

declare(strict_types=1);

require_once __DIR__ . '/ShopProduct.php';

/** Книга: дополнительно хранит количество страниц. */
final class BookProduct extends ShopProduct
{
    public function __construct(
        string $title,
        string $firstName,
        string $lastName,
        float $price,
        public readonly int $pages,
    ) {
        parent::__construct($title, $firstName, $lastName, $price);
    }

    #[\Override]
    public function getSummary(): string
    {
        return parent::getSummary() . ", страниц: {$this->pages}";
    }
}
