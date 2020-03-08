<?php

// Листинг 04.66

class Runner
{

	public static function init()
	{
	  try {
    		$fh = fopen(__DIR__ . "/log.txt", "a");
    		fputs($fh, "Начало\n");
    		$conf = new Conf(dirname(__FILE__) . "/conf.broken.xml");
    		print "user: " . $conf->get('user') . "\n";
    		print "host: " . $conf->get('host') . "\n";
    		$conf->set("pass", "newpass");
    		$conf->write();
    		fputs($fh, "Конец\n");
    		fclose($fh);

  	      } catch (FileException $e) {
    		// Файл не существует или недоступен
    		fputs($fh, "Проблемы с файлом\n");
    		throw $e;

  	      } catch (XmlException $e) {
    		// Поврежденный XML-файл
    		fputs($fh, "Проблемы с XML\n");


  	      } catch (ConfException $e) {
    		// Неверный формат XML-файла
    		fputs($fh, "Проблемы с конфигурацией\n");


  	      } catch (\Exception $e) {
    		// Ловушка: этот код не должен вызываться
    		fputs($fh, "Непредвиденные проблемы\n");
  	      }
	}

}

?>
