<?php

// Листинг 05.36

Class ClassInfo {

   public static function getData(\ReflectionClass $class)
   {
  	$details = "";
  	$name = $class->getName();

  	if ($class->isUserDefined()) {
    		$details .= "$name -- определен пользователем<br />\n";
  	}

  	if ($class->isInternal()) {
    		$details .= "$name -- встроенный класс<br />\n";
  	}

  	if ($class->isInterface()) {
    		$details .= "$name -- интерфейс<br />\n";
  	}

  	if ($class->isAbstract()) {
    		$details .= "$name -- абстрактный класс<br />\n";
  	}

  	if ($class->isFinal()) {
    		$details .= "$name -- завершенный класс<br />\n";
  	}

  	if ($class->isInstantiable()) {
    		$details .= "$name -- можно создать экземпляр объекта<br />\n";
  	} else {
    		$details .= "$name -- нельзя  создать экземпляр объекта<br />\n";
  	}

  	if ($class->isCloneable()) {
    		$details .= "$name -- можно клонировать<br />\n";
  	} else {
    		$details .= "$name -- нельзя клонировать<br />\n";
  	}
  	return $details;
   }

   public static function methodData(ReflectionMethod $method)
   {
      	$details = "";
      	$name = $method->getName();

      	if ($method->isUserDefined()) {
          	$details .= "$name -- определен пользователем.<br />\n";
      	}

      	if ($method->isInternal()) {
          	$details .= "$name -- встроенный метод<br />\n";
      	}

      	if ($method->isAbstract()) {
          	$details .= "$name -- абстрактный метод<br />\n";
      	}

      	if ($method->isPublic()) {
          	$details .= "$name -- открытый метод<br />\n";
      	}

      	if ($method->isProtected()) {
          	$details .= "$name -- защищенный метод<br />\n";
      	}

      	if ($method->isPrivate()) {
          	$details .= "$name -- закрытый метод<br />\n";
      	}

      	if ($method->isStatic()) {
          	$details .= "$name -- статический метод<br />\n";
      	}

      	if ($method->isFinal()) {
          	$details .= "$name -- завершенный метод<br />\n";
      	}

      	if ($method->isConstructor()) {
          	$details .= "$name -- конструктор<br />\n";
      	}

      	if ($method->returnsReference()) {
         	$details .= "$name -- возвращает ссылку, а не значение<br />\n";
      	}

      	return $details;
   }

   public function argData(ReflectionParameter $arg)
   {
       $details = "";
       $declaringclass = $arg->getDeclaringClass();
       $name = $arg->getName();
       $class = $arg->getClass();
       $position = $arg->getPosition();
       $details .= "\$$name расположен в позиции $position\n";

       if (! empty($class)) {
   		$classname = $class->getName();
   		$details .= "\$$name должно быть объектом типа $classname\n";
       }

       if ($arg->isPassedByReference()) {
    		$details .= "\$$name передан по ссылке \n";
       }

       if ($arg->isDefaultValueAvailable()) {
    		$def = $arg->getDefaultValue();
    		$details .= "\$$name имеет стандартное значение: $def\n";
       }

       if ($arg->allowsNull()) {
    		$details .= "\$$name может быть null\n";
       }

       return $details;
    }



}
?>