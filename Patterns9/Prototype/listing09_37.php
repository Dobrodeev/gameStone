<?php

// Листинг 09.37

class AppointmentMaker
{
  public function makeAppointment()
  {
    $encoder = new BloggsApptEncoder();
    return $encoder->encode();
  }
}

?>
