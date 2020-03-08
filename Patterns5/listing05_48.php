<?php

require_once('listing05_47.php');

// Листинг 05.48

class FtpModule implements Module
{
  public function setHost($host)
  {
    print "FtpModule::setHost(): $host\n";
  }

  public function setUser($user)
  {
    print "FtpModule::setUser(): $user\n";
  }

  public function execute()
  {
    // сделать что-нибудь
  }
}


?>