<?php

require_once('listing11_41.php');

// Листинг 11.42

class TextDumpArmyVisitor extends ArmyVisitor
{
  private $text = "";

  public function visit(Unit $node)
  {
    $txt = "";
    $pad = 4*$node->getDepth();
    $txt .= sprintf("%{$pad}s", "");
    $txt .= str_repeat("&nbsp;",$pad);
    $txt .= get_class($node).": ";
    $txt .= "Огневая мощь: ".$node->bombardStrength()."<br />\n";
    $this->text .= $txt;
  }

  public function getText()
  {
    return $this->text;
  }
}

?>
