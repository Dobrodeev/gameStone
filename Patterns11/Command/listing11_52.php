<?php

require_once('listing11_46.php');

// Листинг 11.52

class FeedbackCommand extends Command
{
  public function execute(CommandContext $context): bool
  {
    $msgSystem = Registry::getMessageSystem();
    $email = $context->get('email');
      $msg = $context->get('msg');
    $topic = $context->get('topic');
   $result = $msgSystem->send($email, $msg, $topic);
    if (! $result) {
      $context->setError($msgSystem->getError());
      return false;
    }
    return true;
  }
}

?>
