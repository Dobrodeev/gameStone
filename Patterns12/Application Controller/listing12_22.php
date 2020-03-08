<?php

// Листинг 12.22

class ComponentDescriptor
{
  private $path;
  private static $refcmd;
  private $cmdstr;

  public function __construct(string $path, string $cmdstr)
  {
    self::$refcmd = new \ReflectionClass(Command::class);
    $this->path = $path;
    $this->cmdstr = $cmdstr;
  }

  public function getCommand(): Command
  {
    return $this->resolveCommand($this->cmdstr);
  }

  public function setView(int $status, ViewComponent $view)
  {
    $this->views[$status] = $view;
  }

  public function getView(Request $request): ViewComponent
  {
    $status = $request->getCmdStatus();
    $status = (is_null($status)) ? 0 : $status;
    if (isset($this->views[$status])) {
      return $this->views[$status];
    }
    if (isset($this->views[0])) {
      return $this->views[0];
    }
    throw new AppException("Представление не найдено!");
  }

  public function resolveCommand(string $class): Command
  {
    if (is_null($class)) {
      throw new AppException("Неизвестный класс '$class'!");
    }
    if (! class_exists($class)) {
      throw new AppException("Класс '$class' не найден!");
    }
    $refclass = new \ReflectionClass($class);

    if (! $refclass->isSubClassOf(self::$refcmd)) {
      throw new AppException("Команда '$class' не относится к классу Command!");
    }

    return $refclass->newInstance();
  }
}

?>
