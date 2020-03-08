<?php

// Листинг 04.73

class Person {
  private $_name;
  private $_age;

  public function __set( $property, $value ) {
    $method = "set{$property}";
    if ( method_exists( $this, $method ) ) {
      return $this->$method( $value );
    }
  }

  public function __unset(string $property)
  {
    $method = "set{$property}";
    if (method_exists($this, $method)) {
      $this->$method(null);
    }
  }

  public function setName( $name ) {
    $this->_name = $name;
    if ( ! is_null( $name ) ) {
      $this->_name = mb_strtoupper($this->_name);
      var_dump($this->_name);
    }
  }

  public function setAge( $age ) {
    $this->_age = $age;
  }
}

$p = new Person();
$p->name = "Иван";
// Реальному свойству $_name присваивается строка 'ИВАН'



?>