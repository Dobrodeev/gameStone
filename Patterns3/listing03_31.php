<?php

// Листинг 03.31

public function getSummaryLine()
{
  $base  = "{$this->title} ( {$this->producerMainName}, ";
  $base .= "{$this->producerFirstName} )";
  if ($this->type == 'book') {
      $base .= ": {$this->numPages} стр.";
  } elseif ($this->type == 'cd') {
      $base .= ": Время звучания - {$this->playLength}";
  }
  return $base;
}

?>
