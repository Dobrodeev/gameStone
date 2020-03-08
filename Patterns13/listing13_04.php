<?php

// Листинг 13.04

$mapper = new VenueMapper();
$venue = new Venue(-1, "The Likey Lounge");

// Добавим объект в базу данных
$mapper->insert($venue);

// Снова найдем объект – просто для проверки, что все работает!
$venue = $mapper->find($venue->getId());
print_r($venue);

// Внесем изменение в найденный объект
$venue->setName("The Bibble Beer Likey Lounge");

// Вызовем операцию обновления измененных данных
$mapper->update($venue);

// И снова обратимся к базе данных, чтобы проверить, что все работает
$venue = $mapper->find($venue->getId());
print_r($venue);

?>
