<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OOP</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<script src="assets/jquery-3.2.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<?php  

class Fraction
{
	private $numerator;
	private $denominator;

	public function addFraction (Fraction $fraction)
	{
		$this->numerator = $this->numerator * $fraction->denominator + $this->denominator * $fraction->numerator;
		$this->denominator = $this->denominator * $fraction->denominator;
	} 

	public function __construct($num = 1, $denom = 1)
	{
		$this->numerator = $num;
		if ($denom == 0)
		{
			echo "Incorrect data";
			$this->denominator = 1;
		}	
		else
		{
			$this->denominator = $denom;
		}
	}



	public function toString()
	{
		return $this->numerator . "/" . $this->denominator;
	}


} 

class BeautyFractionOutput extends Fraction
{
	/*** Fraction here
	public function print()
	{
		//need code for printing in view:


		/*
		324532
		------
		23

		1
		-
		2


		10
		--
		15



	}*/
}
//$fr4 = new Animal();
//$fr3 = new FractionOutput(5,5);

$fr1 = new Fraction(1,2);
$fr2 = new Fraction(3,5);


$fr1->addFraction($fr2);
$fr1->addFraction($fr3);

$fr1->simplify();
echo $fr1->toString();
?>
</body>
</html>
