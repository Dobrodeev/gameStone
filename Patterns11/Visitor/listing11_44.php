<?php

require_once('listing11_41.php');

// Листинг 11.44

class TaxCollectionVisitor extends ArmyVisitor
{
  private $due = 0;
  private $report = "";

  public function visit(Unit $node)
  {
    $this->levy($node, 1);
  }

  public function visitArcher(Archer $node)
  {
    $this->levy($node, 2);
  }

  public function visitCavalry(Cavalry $node)
  {
    $this->levy($node, 3);
  }

  public function visitTroopCarrierUnit(TroopCarrierUnit $node)
  {
    $this->levy($node, 5);
  }

  private function levy(Unit $unit, int $amount)
  {
    $this->report .= "Налог для " . get_class($unit);
    $this->report .= ": $amount<br />\n";
    $this->due += $amount;
  }

  public function getReport()
  {
    return $this->report;
  }

  public function getTax()
  {
    return $this->due;
  }
}

?>
