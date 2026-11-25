<?php

declare(strict_types=1);

// Автомобиль и колёса: давление в колесе влияет на скорость машины.

require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/PassengerCar.php';

$grey = new PassengerCar();
$green = new PassengerCar('Green', 120);
$blue = new PassengerCar('Blue', 90);

pageHeader('Автомобиль и колёса');

echo '<p>', h($grey), '</p>';
$grey->color = 'Red';
$grey->accelerate(60);
echo '<p>Перекрасили и разогнали: ', h($grey), '</p>';

echo '<p>', h($blue), '</p>';
$blue->wheels[0]->setPressure(0.3);
echo '<p>Спустили колесо до 0.3 бар: ', h($blue), '</p>';

echo '<p>', h($green), '</p>';
$green->wheels[2]->setPressure(7);
echo '<p>Накачали в третье колесо 7 бар: ', $green->wheels[2]->burst ? '<b>БАБАХ!</b> ' : '', h($green), '</p>';

echo '<p>Давление в колёсах зелёной машины: ',
    implode(', ', array_map(static fn(Wheel $w): string => $w->pressure . ' бар', $green->wheels)), '</p>';

pageFooter();
