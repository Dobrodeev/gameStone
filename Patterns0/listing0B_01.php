<?php

// Листинг Б.01

class Scanner
{
  // Типы лексем
  const WORD       = 1;
  const QUOTE      = 2;
  const APOS       = 3;
  const WHITESPACE = 6;
  const EOL        = 8;
  const CHAR       = 9;
  const EOF        = 0;
  const SOF        = -1;

  protected $line_no = 1;
  protected $char_no = 0;
  protected $token = null;
  protected $token_type = -1;

  // Доступ к исходным данным предоставляется в
  // классе Reader. Получаемые в итоге данные
  // сохраняются в предоставляемом контексте
  public function __construct(Reader $r, Context $context)
  {
    $this->r = $r;
    $this->context = $context;
  }

  public function getContext(): Context
  {
    return $this->context;
  }

  // Пропускает все пробельные знаки
  public function eatWhiteSpace(): int
  {
    $ret = 0;

    if ($this->token_type != self::WHITESPACE &&
        $this->token_type != self::EOL
    ) {
        return $ret;
    }

    while ($this->nextToken() == self::WHITESPACE ||
           $this->token_type == self::EOL
    ) {
        $ret++;
    }

    return $ret;
  }

  // Возвращает строковое представление текущей лексемы
  // или той лексемы, которая указана в аргументе $int
  public function getTypeString(int $int = -1): string
  {
    if ($int < 0) {
      $int = $this->tokenType();
    }
    if ($int < 0) {
      return null;
    }

    $resolve = [
      self::WORD          => 'WORD',
      self::QUOTE         => 'QUOTE',
      self::APOS          => 'APOS',
      self::WHITESPACE    => 'WHITESPACE',
      self::EOL           => 'EOL',
      self::CHAR          => 'CHAR',
      self::EOF           => 'EOF'
    ];

    return $resolve[$int];
  }

  // Возвращает текущий тип лексемы, представленный
  // целым числом
  public function tokenType(): int
  {
    return $this->token_type;
  }

  // Возвращает содержимое текущей лексемы
  public function token()
  {
    return $this->token;
  }

  // Возвращает логическое значение true, если текущая
  // лексема обозначает слово
  public function isWord(): bool
  {
    return ($this->token_type == self::WORD);
  }

  // Возвращает логическое значение true, если текущая
  // лексема обозначает кавычки
  public function isQuote(): bool
  {
    return ($this->token_type == self::APOS ||
            $this->token_type == self::QUOTE);
  }

  // Возвращает номер текущей строки кода в исходном файле
  public function lineNo(): int
  {
    return $this->line_no;
  }

  // Возвращает номер текущего символа в исходном файле
  public function charNo(): int
  {
    return $this->char_no;
  }

  // Клонирует данный объект
  public function __clone()
  {
    $this->r = clone($this->r);
  }

  // Осуществляет переход к следующей лексеме
  // в исходном файле. Устанавливает текущую лексему
  // и отслеживает номер строки и номера символов
  public function nextToken(): int
  {
    $this->token = null;
    $type;

    while (! is_bool($char = $this->getChar())) {
      if ($this->isEolChar($char)) {
          $this->token = $this->manageEolChars($char);
          $this->line_no++;
          $this->char_no = 0;
          $type = self::EOL;

          return ($this->token_type = self::EOL);
      } elseif ($this->isWordChar($char)) {
          $this->token = $this->eatWordChars($char);
          $type = self::WORD;
      } elseif ($this->isSpaceChar($char)) {
          $this->token = $char;
          $type = self::WHITESPACE;
      } elseif ($char == "'") {
          $this->token = $char;
          $type = self::APOS;
      } elseif ($char == '"') {
          $this->token = $char;
          $type = self::QUOTE;
      } else {
          $type = self::CHAR;
          $this->token = $char;
      }
      $this->char_no += strlen($this->token());
      return ($this->token_type = $type);
    }
    return ($this->token_type = self::EOF);
  }

  // Возвращает массив, содержащий тип и содержимое
  // следующей лексемы
  public function peekToken(): array
  {
    $state = $this->getState();
    $type = $this->nextToken();
    $token = $this->token();
    $this->setState($state);
    return [$type, $token];
  }

  // Получает объект типа ScannerState, содержащий текущую
  // позицию синтаксического анализатора в исходном файле
  // и сведения о текущей лексеме
  public function getState(): ScannerState
  {
    $state = new ScannerState();
    $state->line_no = $this->line_no;
    $state->char_no = $this->char_no;
    $state->token = $this->token;
    $state->token_type = $this->token_type;
    $state->r = clone($this->r);
    $state->context = clone($this->context);

    return $state;
  }

  // Использует объект типа ScannerState для
  // восстановления состояния сканера
  public function setState(ScannerState $state)
  {
    $this->line_no    = $state->line_no;
    $this->char_no    = $state->char_no;
    $this->token      = $state->token;
    $this->token_type = $state->token_type;
    $this->r          = $state->r;
    $this->context    	= $state->context;
  }

  //Возвращает следующий символ из исходного файла.
  // Если достигнут конец файла, то возвращается
  // логическое значение
  private function getChar()
  {
    return $this->r->getChar();
  }

  // Возвращает все символы, составляющие слово
  private function eatWordChars(string $char): string
  {
    $val = $char;
    while ($this->isWordChar($char = $this->getChar())) {
      $val .= $char;
    }

    if ($char) {
      $this->pushBackChar();
    }

    return $val;
  }

  // Возвращает все пробельные символы до первого не пробела
  private function eatSpaceChars(string $char): string
  {
    $val = $char;

    while ($this->isSpaceChar($char = $this->getChar())) {
      $val .= $char;
    }

    $this->pushBackChar();

    return $val;
  }

  // Осуществляет переход на один символ назад
  // в исходном файле
  private function pushBackChar()
  {
    $this->r->pushBackChar();
  }

  // Проверяет, относится ли аргумент к символу слова
  private function isWordChar($char): bool
  {
    if (is_bool($char)) {
      return false;
  }

    return (preg_match("/[A-Za-z0-9_\-]/", $char) === 1);
  }

  // Проверяет, относится ли аргумент к пробельному символу
  private function isSpaceChar($char): bool
  {
    return (preg_match("/\t| /", $char) === 1);
  }

  // Проверяет, относится ли аргумент к знаку конца строки
  private function isEolChar($char): bool
  {
    $check = preg_match("/\n|\r/", $char);

    return ($check === 1);
  }

  // Поглощает знаки конца строки \n, \r или \r\n
  private function manageEolChars(string $char): string
  {
    if ($char == "\r") {
      $next_char=$this->getChar();

      if ($next_char == "\n") {
        return "{$char}{$next_char}";
      } else {
        $this->pushBackChar();
      }
    }
    return $char;
  }

  public function getPos(): int
  {
    return $this->r->getPos();
  }
}

?>
