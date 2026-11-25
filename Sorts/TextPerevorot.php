<?php

declare(strict_types=1);

// Задача 3: перевернуть строку задом наперёд, начиная с заданной позиции.

require_once __DIR__ . '/layout.php';

pageHeader('Переворот строки с заданной позиции');
?>
<p>Пример: строка <code>abcdefgggh</code> и позиция 5 дают <code>abcdhgggfe</code>.</p>
<form action="TextPerevorot_handler.php" method="post">
    <div class="form-group">
        <label for="text">Строка</label>
        <input type="text" class="form-control" id="text" name="text" required placeholder="abcdefgggh">
    </div>
    <div class="form-group">
        <label for="position">Номер символа, с которого начинается переворот (с 1)</label>
        <input type="number" class="form-control" id="position" name="position" min="1" required placeholder="5">
    </div>
    <button type="submit" class="btn btn-primary">Перевернуть строку</button>
</form>
<?php
pageFooter();
