<?php

// Листинг 05.50

class ModuleRunner
{
  private $configData = [ "PersonModule" =>
                               ['person' => 'bob'],
                        "FtpModule" => 
                         [
                            'host' => 'example.com',
                            'user' => 'anon'
                         ]
                        ];
  private $modules = [];
  // ...

  public function init()
  {
    $interface = new ReflectionClass('Module');
    foreach ($this->configData as $modulename => $params) {
      $module_class = new ReflectionClass($modulename);
      if (! $module_class->isSubclassOf($interface)) {
        throw new Exception(
              "Неизвестный тип модуля: $modulename");
      }
      $module = $module_class->newInstance();
      foreach ($module_class->getMethods() as $method) {
        $this->handleMethod($module, $method, $params);
          // Метод handleMethod() представлен
          // в последующем листинге!
      }
      array_push($this->modules, $module);
    }
  }

  public function handleMethod(Module $module,
       ReflectionMethod $method, $params)
  {
    $name = $method->getName();
    $args = $method->getParameters();

    if (count($args) != 1 || substr($name, 0, 3) != "set") {
      return false;
    }

    $property = strtolower(substr($name, 3));

    if (! isset($params[$property])) {
      return false;
    }

    $arg_class = $args[0]->getClass();

    if (empty($arg_class)) {
      $method->invoke($module, $params[$property]);
    } else {
      $method->invoke(
      $module, $arg_class->newInstance($params[$property])
    );
  }
}



}

?>
