<?php

// Листинг 18.19

//namespace popp\ch18\batch04;

//require_once('vendor/autoload.php');
require_once('/root/php5ed/vendor/autoload.php');
use PHPUnit\Framework\TestCase;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use Facebook\WebDriver\WebDriverBy;

class SeleniumTest extends TestCase
{
  private $driver;

  protected function setUp(): void
  {
    $host = "http://127.0.0.1:4444/wd/hub";
    $capabilities = 
      [WebDriverCapabilityType::BROWSER_NAME => 'firefox'];
    $this->driver =
      RemoteWebDriver::create($host, $capabilities);
  }

  public function testAddVenue(): void
  {
  }
}

?>
