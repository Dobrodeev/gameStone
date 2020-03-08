<?php


// Листинг 04.64

class Conf
{
  private $file;
  private $xml;
  private $lastmatch;

  function __construct(string $file)
  {
    $this->file = $file;
    if (! file_exists($file)) {
       throw new FileException("Файл '$file' не найден");
    }
    $this->xml = simplexml_load_file(
                 $file, null, LIBXML_NOERROR);
    if (! is_object($this->xml)) {
      throw new XmlException(libxml_get_last_error());
    }
    $matches = $this->xml->xpath("/conf");
    if (! count($matches)) {
      throw new ConfException(
            "Не найден корневой элемент: conf");
    }
  }

   public function write()
   {
     if (! is_writeable($this->file)) {
        throw new \Exception(
              "Файл '{$this->file}' недоступен по записи");
     }
     file_put_contents($this->file, $this->xml->asXML());
   }

  public function get(string $str)
  {
    $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
    if (count($matches)) {
      $this->lastmatch = $matches[0];
      return (string)$matches[0];
    }
    return null;
  }

  public function set(string $key, string $value)
  {
    if (! is_null($this->get($key))) {
      $this->lastmatch[0]=$value;
      return;
    }
    $conf = $this->xml->conf;
    $this->xml->addChild('item', $value)->
                addAttribute('name', $key);
  }
}
?>
