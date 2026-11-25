<?php

declare(strict_types=1);

require_once __DIR__ . '/Node.php';

/**
 * Односвязный список из узлов Node.
 * Хранит ссылки на первый и последний узлы, поэтому добавление в начало и в конец — O(1).
 * Поддерживает foreach и count().
 *
 * @template T
 * @implements IteratorAggregate<int, T>
 */
final class Our_List implements IteratorAggregate, Countable
{
    private ?Node $head = null;
    private ?Node $tail = null;
    private int $count = 0;

    /** @param iterable<T> $items */
    public function __construct(iterable $items = [])
    {
        foreach ($items as $item) {
            $this->pushBack($item);
        }
    }

    /** Добавить элемент в начало списка. */
    public function pushFront(mixed $data): void
    {
        $this->head = new Node($data, $this->head);
        $this->tail ??= $this->head;
        $this->count++;
    }

    /** Добавить элемент в конец списка. */
    public function pushBack(mixed $data): void
    {
        $node = new Node($data);
        if ($this->tail === null) {
            $this->head = $node;
        } else {
            $this->tail->next = $node;
        }
        $this->tail = $node;
        $this->count++;
    }

    /**
     * Удалить первый элемент и вернуть его значение.
     *
     * @return T
     * @throws UnderflowException если список пуст
     */
    public function popFront(): mixed
    {
        $node = $this->head ?? throw new UnderflowException('Список пуст');

        $this->head = $node->next;
        if ($this->head === null) {
            $this->tail = null;
        }
        $this->count--;

        return $node->data;
    }

    /**
     * Элемент по индексу (с 0).
     *
     * @return T
     * @throws OutOfRangeException если индекса нет в списке
     */
    public function get(int $index): mixed
    {
        if ($index < 0 || $index >= $this->count) {
            throw new OutOfRangeException("Нет элемента с индексом {$index}, в списке {$this->count} элементов");
        }

        $node = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $node = $node->next;
        }

        return $node->data;
    }

    public function isEmpty(): bool
    {
        return $this->count === 0;
    }

    public function count(): int
    {
        return $this->count;
    }

    /** @return Generator<int, T> */
    public function getIterator(): Generator
    {
        for ($node = $this->head, $i = 0; $node !== null; $node = $node->next, $i++) {
            yield $i => $node->data;
        }
    }

    /** @return list<T> */
    public function toArray(): array
    {
        return iterator_to_array($this, false);
    }
}
