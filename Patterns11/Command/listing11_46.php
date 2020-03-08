<?php

// Листинг 11.46

abstract class Command
{
  abstract public function execute(
           CommandContext $context): bool;
}

?>
