<?php

declare(strict_types=1);

/**
 * Узел односвязного списка: значение и ссылка на следующий узел.
 *
 * @template T
 */
final class Node
{
    /** @param T $data */
    public function __construct(
        public readonly mixed $data,
        public ?Node $next = null,
    ) {
    }
}
