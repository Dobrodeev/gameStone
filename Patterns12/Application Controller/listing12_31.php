<?php

require_once('listing12_30.php');

// Листинг 12.31

class AddVenue extends Command
{
  public function doExecute(Request $request): int
  {
    $name = $request->getProperty("venue_name");

    if (is_null($name)) {
      $request->addFeedback("Имя не указано! ");
      return self::CMD_INSUFFICIENT_DATA;
    } else {
      // сделать что-нибудь
      $request->addFeedback("'{$name}' добавлено");
      return self::CMD_OK;
    }
    return self::CMD_DEFAULT;
  }
}

?>
