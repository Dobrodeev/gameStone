<?php
/**
 * Упрщает неправильную дробь и выводит ее в красивом виде
 * @package fractions
 * @author A. Maleev
 * @copyright 2018
 * */
class BeautyFractionOutput extends Fraction
{
    /**
     * Используется для упрощения дроби
     * @var int
     */
    protected $intPart;

    /**
     * Обычный вывод дроби
     * @param
     * @return void
     * */
    public function simpleOutput()
    {
        echo $this->numerator.' / '.$this->denominator.'<br>';
    }

    /**
     * Красивый вывод дроби
     * @param $chus object
     * @param $znam object
     * @return void
     * */
    public function printFraction($chus, $znam)
    {
        echo $chus.' / '.$znam.'<br>';
        $saveChus = $chus;
        $counter = 0;
        while ($chus / 10 >= 1) {
            $chus /= 10;
            $counter++;
        }
        echo 'Красивый вывод дроби: <br>';
        echo $saveChus.'<br>';
        for ($i = 0; $i <= $counter; $i++) {
            echo '-';
        }
        echo '<br>';
        echo $znam.'<br>';
    }

    /**
     * Упрощение дроби
     * @param $chus object
     * @param $znam object
     * @return void
     * */
    public function simplification($chus, $znam)
    {
        $this->intPart = 0;
        if ($chus > $znam) {
            while ($chus > $znam) {
                $chus %= $znam;
                $this->intPart++;
            }
        }
        echo 'Дробь после упрщения: <br>';
        echo $this->intPart.' '.$chus.' / '.$znam.'<br>';
    }
}