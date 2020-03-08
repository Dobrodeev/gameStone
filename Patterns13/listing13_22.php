<?php

// Листинг 13.22

  // Класс ObjectWatcher

  private $all = [];
  private $dirty = [];
  private $new = [];
  private $delete = []; // не используется в данном примере
  private static $instance = null;

  public static function addDelete(DomainObject $obj)
  {
    $inst = self::instance();
    $inst->delete[$self->globalKey($obj)] = $obj;
  }

  public static function addDirty(DomainObject $obj)
  {
    $inst = self::instance();

    if (! in_array($obj, $inst->new, true)) {
      $inst->dirty[$inst->globalKey($obj)] = $obj;
    }
  }

  public static function addNew(DomainObject $obj)
  {
    $inst = self::instance();
    // идентификатор пока еще отсутствует
    $inst->new[] = $obj;
  }

  public static function addClean(DomainObject $obj)
  {
    $inst = self::instance();
    unset($inst->delete[$inst->globalKey($obj)]);
    unset($inst->dirty[$inst->globalKey($obj)]);

    $inst->new = array_filter(
           $inst->new,
           function ($a) use ($obj) {
               return !($a === $obj);
           }
    );
  }

  public function performOperations()
  {
    foreach ($this->dirty as $key => $obj) {
      $obj->getFinder()->update($obj);
    }

    foreach ($this->new as $key => $obj) {
      $obj->getFinder()->insert($obj);
      print "Вставка " . $obj->getName() . "\n";
    }

    $this->dirty = [];
    $this->new = [];
  }

?>
