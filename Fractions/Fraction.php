<?php
/**
 * Определяет создание дродей, суммирование, упрощение и преобразование дроби в строку (метод toString)
 * @package fractions
 * @author A. Maleev
 * @copyright 2018
 * */
class Fraction
{
    /**
     * @var int
     */
    protected $numerator;
    /**
     * @var int
     */
    protected $denominator;

    /**
     * Создает дробь из двух чисел: числителя и знаменателя
     * @param $num  int числитель
     * @param $denom int знаменатель
     * @return void
     */
    public function __construct($num = 1, $denom = 1)
    {
        $this->numerator = $num;
        if ($denom == 0) {
            echo "Incorrect data";
            $this->denominator = 1;
        } else {
            $this->denominator = $denom;
        }
    }

    /**
     * Суммируем две дроби
     * @param $fraction object
     * @return void
     */
    public function addFraction(Fraction $fraction)
    {
        $this->numerator = $this->numerator * $fraction->denominator + $this->denominator * $fraction->numerator;
        $this->denominator = $this->denominator * $fraction->denominator;
    }

    /**
     * Формируем красивый вывод дроби, например было 111/113
     * стало: 111
     *        ---
     *        113
     * @param
     * @return void
     */
    public function simplify()
    {
        $i = 10;
        while ($i > 1) {
            if (($this->numerator % $i == 0) && ($this->denominator % $i == 0)) {
                $this->numerator /= $i;
                $this->denominator /= $i;
                $i = 11;
            }
            $i--;
        }
    }

    /**
     *
     */
    public function toString()
    {
        return $this->numerator."/".$this->denominator;
    }
}