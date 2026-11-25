<?php
session_start();

const ROBOTS_SIZE = 32000; // максимальный размер robots.txt в байтах (32 КБ)

/**
 * Возвращает строки файла, которые являются директивой $name (например, "Host: site.ru").
 * Совпадение ищется только в начале строки, комментарии после # отбрасываются.
 */
function findDirectives($content, $name)
{
    $result = [];
    foreach (preg_split('/\r\n|\r|\n/', $content) as $line) {
        $line = trim(preg_replace('/#.*/', '', $line));
        if (preg_match('/^' . preg_quote($name, '/') . '\s*:/i', $line)) {
            $result[] = $line;
        }
    }
    return $result;
}

/**
 * Максимальное количество директив Host внутри одного блока User-agent.
 * Если Host повторяется в разных блоках User-agent, это не ошибка.
 */
function getMaxHostPerGroup($content)
{
    $max = 0;
    $count = 0;
    foreach (preg_split('/\r\n|\r|\n/', $content) as $line) {
        $line = trim(preg_replace('/#.*/', '', $line));
        if (preg_match('/^user-agent\s*:/i', $line)) {
            $count = 0;
        } elseif (preg_match('/^host\s*:/i', $line)) {
            $count++;
            $max = max($max, $count);
        }
    }
    return $max;
}

$arrayInfo = [
    ['id' => 1, 'check' => 'Проверка наличия файла robots.txt', 'status' => 'Error'],
    ['id' => 2, 'check' => 'Проверка указания директивы Host', 'status' => 'Error'],
    ['id' => 3, 'check' => 'Проверка количества директив Host, прописанных в файле', 'status' => 'Error'],
    ['id' => 4, 'check' => 'Проверка размера файла robots.txt', 'status' => 'Error'],
    ['id' => 5, 'check' => 'Проверка указания директивы Sitemap', 'status' => 'Error'],
    ['id' => 6, 'check' => 'Проверка кода ответа сервера для файла robots.txt', 'status' => 'Error'],
];

$host = trim($_GET['host'] ?? '');
$message = '';
$checked = false;

if ($host !== '') {
    if (!preg_match('~^https?://~i', $host)) {
        $host = 'http://' . $host;
    }
    $fileName = rtrim($host, '/') . '/robots.txt';

    $c = curl_init($fileName);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_FOLLOWLOCATION, true); // переходить по редиректам 301/302
    curl_setopt($c, CURLOPT_MAXREDIRS, 5);
    curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($c, CURLOPT_TIMEOUT, 20);
    curl_setopt($c, CURLOPT_USERAGENT, 'robots.txt checker');

    $content = curl_exec($c);
    $info = curl_getinfo($c);
    $checked = true;

    if (curl_errno($c)) {
        // сайт недоступен: все проверки остаются Error
        $message = 'Не удалось подключиться к ' . $fileName . ': ' . curl_error($c);
    } elseif ($info['http_code'] != 200) {
        // файла нет или сервер его не отдаёт: все проверки остаются Error
        $message = 'Сервер вернул код ' . $info['http_code'] . ' для ' . $info['url'];
    } else {
        $arrayInfo[0]['status'] = 'OK';
        $arrayInfo[5]['status'] = 'OK';
        $arrayInfo[3]['status'] = $info['size_download'] > ROBOTS_SIZE ? 'Error' : 'OK';
        $arrayInfo[4]['status'] = findDirectives($content, 'Sitemap') ? 'OK' : 'Error';

        $maxHost = getMaxHostPerGroup($content);
        $arrayInfo[1]['status'] = $maxHost > 0 ? 'OK' : 'Error';
        $arrayInfo[2]['status'] = $maxHost == 1 ? 'OK' : 'Error';

        $message = 'Проверен файл ' . $info['url'] . ' (код ответа ' . $info['http_code']
            . ', размер ' . $info['size_download'] . ' байт)';
    }

    $_SESSION['arr'] = $arrayInfo;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Анализ robots.txt</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="../assets/jquery-3.2.1.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<h3>Анализ robots.txt</h3>
<form action="" method="get">
    <div class="form-group">
        <label for="host">Адрес сайта</label>
        <input type="text" class="form-control" id="host" placeholder="https://site.ru" name="host"
               value="<?= htmlspecialchars($_GET['host'] ?? '') ?>">
    </div>
    <button type="submit" class="btn btn-default">Анализировать robots.txt</button>
</form>
<?php if ($checked): ?>
    <p><?= htmlspecialchars($message) ?></p>
    <h5>Результат теста</h5>
    <table class="table table-striped table-bordered">
        <tr><th>№</th><th>Название проверки</th><th>Состояние</th></tr>
        <?php foreach ($arrayInfo as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['check']) ?></td>
                <td><?= $row['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <form action="infoRobotsExcel.php" method="post">
        <button type="submit" class="btn btn-default" name="go">Сохранить в Excel</button>
    </form>
<?php endif; ?>
</body>
</html>
