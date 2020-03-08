<?php

// Листинг 12.41

class VenueManager extends Base
{
  private $addvenue = "INSERT INTO venue
                      (name)
                      VALUES(?)";

  private $addspace = "INSERT INTO space
                      (name, venue)
                      VALUES(?, ?)";
  private $addevent = "INSERT INTO event
                      (name, space, start, duration)
                      VALUES(?, ?, ?, ?)";
  // ...

?>
