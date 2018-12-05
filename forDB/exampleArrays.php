<?php
/* примеры работы с ассоциативными массивами */
$array1 = [13, 'кабель', true];
$array2 = ['city'=>'Kiev' 'institute'=>'KPI']
$array3 = array(
    array('строчка1', 'strochka2', 'strochka3'),
    array('something1', 'textures', 'poliglot'),
    array('poligon', '3D Max', 'cebab')
);
$edu='institute';

echo $array1[1]; // кабель
echo $array2['institute']; //KPI
echo $array3[2][1]; //3D Max
echo $array2[$edu]; //KPI

//each - каждый
// первая итерация
foreach ($array1 as $st)
{
    echo $st.'<br>';//13
}
// втрорая итерация
foreach ($array1 as $st)
{
    echo $st.'<br>';//кабель
}

$array1[] = 'еще елемент';
$array2['somewhere'] = 'outside';
$array3[2][] = 'retro';// вместо $array3[2] подставляется array('poligon', '3D Max', 'cebab') работаем теперь с array