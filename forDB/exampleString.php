<?php
$x1='Строка';
$x2 = 117;
$x3 = [12, 'strochka', 'institute'=>'NAU'];
$x4 = [['KPI', 'Kiev']];
$x4 = array(
    array('KPI', 'Kiev')
);
$x5 = 'institute';

echo $x1;
echo 'stroca texta'.$x1;
echo 'stroca texta'.'Строка1';
echo $x3[0];
echo 12;
//echo $x4[];

echo $x3['institute'];// NAU
echo $x3[$x5];// NAU тоесть вместо переменной $x5 подставляется строка 'institute'
echo $x4[1];// NULL
echo $x4[0][1];// Kiev