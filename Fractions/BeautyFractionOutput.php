<?php
class BeautyFractionOutput extends Fraction
{
    protected $intPart;

    public function simpleOutput()
    {
        echo $this->numerator.' / '.$this->denominator.'<br>';
    }
    public function printFraction($chus, $znam)
    {
        echo $chus.' / '.$znam.'<br>';
        $saveChus = $chus;
        $counter = 0;
        while ($chus / 10 >= 1)
        {
            $chus /= 10;
            $counter++;
        }
        echo 'Красивый вывод дроби: <br>';
        echo $saveChus.'<br>';
        for ($i = 0; $i <= $counter; $i++)
        {
            echo '-';
        }
        echo '<br>';
        echo $znam.'<br>';
    }

    public function simplification($chus, $znam)
    {
        $this->intPart = 0;
        if ($chus > $znam)
        {
            while ($chus > $znam)
            {
                $chus %= $znam;
                $this->intPart++;
            }
        }
        echo 'Дробь после упрщения: <br>';
        echo $this->intPart.' '.$chus.' / '.$znam.'<br>';
    }
}