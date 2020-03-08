// Листинг 03.17

public function outputAddresses($resolve)
{
  if (is_string($resolve)) {
    $resolve = (preg_match("/^(false|no|off)$/i", $resolve))
               ? false : true;
  }
  // ...
}
