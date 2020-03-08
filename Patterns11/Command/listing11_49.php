<?php

// Листинг 11.49

class CommandNotFoundException extends Exception {}

class CommandFactory {
   private static $dir = 'commands';

   public static function getCommand(
          string $action = 'Default'): Command {
      if ( preg_match( '/\W/', $action ) ) {
         throw new Exception("Недопустимые символы в команде");
      }

      $class = UCFirst(strtolower($action)) . "Command";
     // $file  = self::$dir . DIRECTORY_SEPARATOR . "{$class}.php";
     // if ( ! file_exists( $file ) ) {
     //    throw new CommandNotFoundException( "Файл '$file' не найден" );
     // }
     // require_once( $file );
      if ( ! class_exists( $class ) ) {
         throw new CommandNotFoundException( "Класс '$class' не обнаружен" );
      }
      $cmd = new $class();
      return $cmd;
   }
}

?>
