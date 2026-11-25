<?php

declare(strict_types=1);

enum Operation: string
{
    case Add = '+';
    case Subtract = '-';
    case Multiply = '*';
    case Divide = '/';
    case Modulo = '%';
    case SumOfSquares = 'x^2+y^2';
    case SumOfCubes = 'x^3+y^3';

    public function label(): string
    {
        return match ($this) {
            self::Add => '+',
            self::Subtract => '−',
            self::Multiply => '×',
            self::Divide => '÷',
            self::Modulo => '% (остаток от деления)',
            self::SumOfSquares => 'x² + y²',
            self::SumOfCubes => 'x³ + y³',
        };
    }

    public function apply(float $x, float $y): float
    {
        if (in_array($this, [self::Divide, self::Modulo], true) && $y == 0.0) {
            throw new DivisionByZeroError('Деление на ноль');
        }

        return match ($this) {
            self::Add => $x + $y,
            self::Subtract => $x - $y,
            self::Multiply => $x * $y,
            self::Divide => $x / $y,
            self::Modulo => fmod($x, $y),
            self::SumOfSquares => $x ** 2 + $y ** 2,
            self::SumOfCubes => $x ** 3 + $y ** 3,
        };
    }
}

final readonly class Calculator
{
    public function __construct(
        public float $first,
        public float $second,
        public Operation $operation,
    ) {
    }

    /**
     * Создание из данных формы. Возвращает текст ошибки, если данные некорректны.
     */
    public static function fromInput(array $input): self|string
    {
        $first = filter_var($input['first'] ?? '', FILTER_VALIDATE_FLOAT);
        $second = filter_var($input['second'] ?? '', FILTER_VALIDATE_FLOAT);
        $operation = Operation::tryFrom((string)($input['operation'] ?? ''));

        return match (true) {
            $first === false, $second === false => 'Введите два числа',
            $operation === null => 'Не выбрано действие',
            default => new self($first, $second, $operation),
        };
    }

    public function result(): float
    {
        return $this->operation->apply($this->first, $this->second);
    }

    /** Пример: «7 ÷ 2 = 3.5» или «7 ÷ 0: Деление на ноль». */
    public function describe(): string
    {
        // отрицательные числа в скобках, чтобы (-2)² не читалось как -(2²)
        [$x, $y] = array_map(
            static fn(float $n): string => $n < 0 ? '(' . self::format($n) . ')' : self::format($n),
            [$this->first, $this->second],
        );
        $expression = match ($this->operation) {
            Operation::SumOfSquares => "{$x}² + {$y}²",
            Operation::SumOfCubes => "{$x}³ + {$y}³",
            Operation::Modulo => "{$x} mod {$y}",
            default => "{$x} {$this->operation->label()} {$y}",
        };

        try {
            return $expression . ' = ' . self::format($this->result());
        } catch (DivisionByZeroError $e) {
            return $expression . ': ' . $e->getMessage();
        }
    }

    /** Число без лишних нулей: 3.0 → 3, 0.1 + 0.2 → 0.3. */
    public static function format(float $number): string
    {
        return rtrim(rtrim(number_format($number, 10, '.', ''), '0'), '.');
    }
}
