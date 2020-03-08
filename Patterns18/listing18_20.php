<?php

// Листинг 18.20

namespace popp\ch18\batch04;

require_once('vendor/autoload.php');
use PHPUnit\Framework\TestCase;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use Facebook\WebDriver\WebDriverBy;

class seleniumtest3 extends TestCase {

  protected function setUp() {
    $host = "http://127.0.0.1:4444/wd/hub";
    $capabilities = array(
      WebDriverCapabilityType::BROWSER_NAME => 'firefox');
    $this->driver = RemoteWebDriver::create($host, $capabilities);
  }

  public function testAddVenue() {
    $this->driver->get(
      "http://popp.vagrant.internal/webwoo/AddVenue.php");
    $venel = $this->driver->findElement(WebDriverBy::name("venue_name"));
    $venel->sendKeys("my_test_venue");
    $venel->submit();

    $tdel = $this->driver->findElement(WebDriverBy::xpath("//td[1]"));
    $this->assertRegexp("/'my_test_venue' added/",$tdel->getText());
    $spacel = $this->driver->findElement(WebDriverBy::name("space_name"));
    $spacel->sendKeys("my_test_space");
    $spacel->submit();
    $el = $this->driver->findElement(WebDriverBy::xpath("//td[1]"));
    $this->assertRegexp("/'my_test_space' added/",$el->getText());
  }
}

?>
