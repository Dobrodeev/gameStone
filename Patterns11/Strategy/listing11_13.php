<?php

// Листинг 11.13

abstract class Question
{
  protected $prompt;
  protected $marker;

  public function __construct(string $prompt, Marker $marker)
  {
    $this->prompt = $prompt;
    $this->marker = $marker;
  }

  public function mark(string $response): bool
  {
    return $this->marker->mark($response);
  }
}

?>
