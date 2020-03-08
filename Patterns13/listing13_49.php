<?php

// Листинг 13.49

$idobj = $factory->getIdentityObject()
                 ->field('name')
                 ->eq('The Eyeball Inn');

$collection = $finder->find($idobj);

foreach ($collection as $venue) {
    print $venue->getName()."\n";
}


?>
