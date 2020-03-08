<?php


// листинг 04.02

class StaticExample
{
  static public $aNum = 0;
  public static function sayHello()
  {
    self::$aNum++;
    print "Привет! (".self::$aNum.")\n";
  }
}

?>
