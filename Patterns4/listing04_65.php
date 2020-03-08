// Листинг 04.65

  public static function init()
  {
    try {
      $conf = new Conf(__DIR__."/conf.broken.xml");
      print "user: " . $conf->get('user') . "\n";
      print "host: " . $conf->get('host') . "\n";
      $conf->set("pass", "newpass");
      $conf->write();
    } catch (FileException $e) {
      // Файл не существует или недоступен
    } catch (XmlException $e) {
      // Поврежденный XML-файл
    } catch (ConfException $e) {
      // Неверный формат XML-файла
    } catch (\Exception $e) {
      // Ловушка: этот код не должен вызываться
    }
  }
