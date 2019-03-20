<?php

/**
* 
*/
class Wheel
{
	private $pressure,
	        $d,
	        $owner;

	function __construct($owner = NULL, $pressure = 2.0, $d = 13)
	{
		$this->pressure = $pressure;
		$this->d = $d;
		$this->owner = $owner;
	}
	
	function getPressure() {return $this->pressure;}

	function setPressure($pressure)
	{
		if ($pressure < 0) $pressure = 0;
		if ($pressure > 5) 
		{
			echo "BABAH!!!<br>";
			$pressure = 0;
		}
		if ($this->owner != NULL)
		{
			if ($pressure == 0)
				$this->owner->speed = 0;
			else if($pressure < 0.5)
				$this->owner->speed /= 2;
		}
		$this->pressure = $pressure;
	}
}

class Car
{
	public 	$year,
			$color,
			$speed,
			$wheels = array();

	function __construct($color = 'Grey', $speed = 0)
	{
		$this->color = $color;
		$this->speed = $speed;
		for ($i=0; $i < 4 ; ++$i) { 
			$this->wheels[$i] = new Wheel($this);
		}
	}

	function aacelerate($speed)
	{
		$this->speed += $speed;	
	}

	function __toString()
	{
		return "This is {$this->color} car with speed = {$this->speed}!";
	}
}

$a = new Car();
$b = new Car('Green', 120);

$b->wheels[2]->setPressure(7);
echo $a."<br>";
$a->color = 'Red';
echo $a."<br>";
echo $b."<br>";

for ($i=0; $i < 4; ++$i) { 
	echo $b->wheels[$i]->getPressure() . "<br>";	
}

function post(&$x)
{
	$temp = $x;
	$x += 1;
	return $temp;
}

function pref(&$x)
{
	return $x += 1;;
}


$x = 10;
echo post($x)."<br>";
echo $x."<br>";

$x = 10;
echo $x++."<br>";
echo $x."<br>";


$x = 10;
echo pref($x)."<br>";
echo $x."<br>";

$x = 10;
echo ++$x."<br>";
echo $x."<br>";