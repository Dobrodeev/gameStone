<?php

declare(strict_types=1);

require_once __DIR__ . '/../Sorts/TaskArrays.php';

enum Suit: string
{
    case Hearts = '♥';
    case Diamonds = '♦';
    case Clubs = '♣';
    case Spades = '♠';

    public function isRed(): bool
    {
        return $this === self::Hearts || $this === self::Diamonds;
    }
}

enum Rank: string
{
    case Ace = 'A';
    case King = 'K';
    case Queen = 'Q';
    case Jack = 'J';
    case Ten = '10';
    case Nine = '9';
    case Eight = '8';
    case Seven = '7';
    case Six = '6';
    case Five = '5';
    case Four = '4';
    case Three = '3';
    case Two = '2';
}

final readonly class Card implements Stringable
{
    public function __construct(public Rank $rank, public Suit $suit)
    {
    }

    public function __toString(): string
    {
        return $this->rank->value . $this->suit->value;
    }
}

/** Колода из 52 карт. Раздача снимает карты сверху, поэтому одна карта не может выпасть дважды. */
final class Deck implements Countable
{
    /** @var list<Card> */
    private array $cards = [];

    public function __construct()
    {
        foreach (Rank::cases() as $rank) {
            foreach (Suit::cases() as $suit) {
                $this->cards[] = new Card($rank, $suit);
            }
        }
        shuffle($this->cards);
    }

    /** @return list<Card> */
    public function deal(int $count): array
    {
        if ($count > count($this->cards)) {
            throw new UnderflowException('В колоде не хватает карт');
        }

        return array_splice($this->cards, 0, $count);
    }

    public function count(): int
    {
        return count($this->cards);
    }
}

/**
 * Упражнения с массивами: раздача карт (техасский холдем), задачи на массив чисел,
 * примеры стандартных функций работы с массивами.
 */
final class ExampleClass
{
    /**
     * Раздача в холдеме: каждому игроку по 2 карты, затем флоп — 3 общие карты.
     *
     * @return array{hands: list<list<Card>>, flop: list<Card>, left: int}
     */
    public function cardsGame(int $players = 2): array
    {
        $deck = new Deck();
        $hands = [];
        for ($i = 0; $i < $players; $i++) {
            $hands[] = $deck->deal(2);
        }
        $flop = $deck->deal(3);

        return ['hands' => $hands, 'flop' => $flop, 'left' => count($deck)];
    }

    /**
     * 16 задач на массивы из НАУ (решения — в Sorts/TaskArrays.php).
     *
     * @return array<string, int|float|string>
     */
    public function exercisesArrays(array $numbers = [49, -13, 26, -3, 19, 29, 3, 27, -20, 18]): array
    {
        return new TaskArrays($numbers)->exercises();
    }

    /**
     * Примеры стандартных функций для работы с массивами.
     *
     * @return array<string, string>
     */
    public function someFunctionsArrays(): array
    {
        $numbers = [49, -13, 26, -3, 19, 29, 3, 27, -20, 18];
        $extended = [...$numbers, 56, -39, -43, 119, 21];
        $x1 = 'first X1';
        $x2 = 'second X2';
        $show = static fn(array $array): string => json_encode($array, JSON_UNESCAPED_UNICODE);

        return [
            'Исходный массив' => $show($numbers),
            'Индексы элементов > 6 (array_filter + array_keys)' => $show(array_keys(array_filter($numbers, static fn(int $n): bool => $n > 6))),
            'Добавили элементы (spread-оператор ...)' => $show($extended),
            'Ключ максимального элемента (array_search + max)' => (string)array_search(max($extended), $extended, true),
            'Первый отрицательный элемент (array_find)' => (string)array_find($extended, static fn(int $n): bool => $n < 0),
            'Есть ли элемент > 100 (array_any)' => array_any($extended, static fn(int $n): bool => $n > 100) ? 'да' : 'нет',
            'Все ли элементы < 200 (array_all)' => array_all($extended, static fn(int $n): bool => $n < 200) ? 'да' : 'нет',
            'Градусы Цельсия → Фаренгейт (range + array_map)' => $show(array_combine(
                range(0, 100, 20),
                array_map(static fn(int $c): float => 9 / 5 * $c + 32, range(0, 100, 20)),
            )),
            'Массив из переменных (compact)' => $show(compact('x1', 'x2')),
            'Случайный элемент (array_rand)' => (string)$numbers[array_rand($numbers)],
        ];
    }
}
