<?php


// Листинг 12.05

class Registry
{
  private static $instance=null;
  private $values = [];

  private $treeBuilder = null;
  private $conf = null;


  private static $testmode = false;


  private function __construct()
  {
  }
/*
  public static function instance(): self
  {
    if (is_null(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }
*/
  public static function instance(): self
  {
    if (is_null(self::$instance)) {
      if (self::$testmode) {
        self::$instance = new MockRegistry();
      } else {
        self::$instance = new self();
      }
    }
    return self::$instance;
  }


  public function get(string $key)
  {
    if (isset($this->values[$key])) {
      return $this->values[$key];
    }
    return null;
  }

  public function set(string $key, $value)
  {
    $this->values[$key] = $value;
  }

  public function treeBuilder(): TreeBuilder
  {
    if (is_null($this->treeBuilder)) {
     $this->treeBuilder = new TreeBuilder(
            $this->conf()->get('treedir'));
    }
    return $this->treeBuilder;
  }

  public function conf(): Conf
  {
    if (is_null($this->conf)) {
      $this->conf = new Conf();
    }
    return $this->conf;
  }

  public static function testMode(bool $mode = true)
  {
    self::$instance = null;
    self::$testmode = $mode;
  }




}

class MockRegistry extends Registry
{
}

?>
