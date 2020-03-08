<?php

require_once('listing09_02.php');

// Листинг 09.03

class NastyBoss
{
  private $employees = [];

  public function addEmployee(string $employeeName)
  {
    $this->employees[] = new Minion($employeeName);
  }

  public function projectFails()
  {
    if (count($this->employees) > 0) {
      $emp = array_pop($this->employees);
      $emp->fire();
    }
  }
}

?>