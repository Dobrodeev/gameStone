<?php

// Листинг 11.37

abstract class Unit
{
  // ...
  public function textDump($num = 0): string
  {
    $txtout = "";
    $pad = 4*$num;
    $txtout .= sprintf("%{$pad}s", "");
    $txtout .= get_class($this).": ";
    $txtout .= "Огневая мощь: ".$this->bombardStrength()."<br />\n";
    return $txtout;
  }
  // ...
}

?>
