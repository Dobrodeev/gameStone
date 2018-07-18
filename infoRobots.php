<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game result</title>
    <!-- <link rel="stylesheet" href="assets/style.css"> -->
    <link rel="stylesheet" href="assets/reset.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="assets/jquery-3.2.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    <h3>Анализ robots.txt</h3>
<form action="#" method="get">
    <div class="form-group">
        <label for="exampleInputUrl">url address</label>
        <input type="url" class="form-control" id="exampleInputEmail1" placeholder="host" name="host">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
<?php
const ROBOTS_SIZE = 32000;

$host = $_GET['host'];
$file_name = $host . '/robots.txt';

$c = curl_init($file_name);
curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);

$content = curl_exec($c);
$info = curl_getinfo($c);
$arrayInfo = array(
    array('id'=>1, 'check'=>'Проверка наличия файла robots.txt', 'status'=>'unchecked'),
    array('id'=>2, 'check'=>'Проверка указания директивы Host', 'status'=>'unchecked'),
    array('id'=>3, 'check'=>'Проверка количества директив Host, прописанных в файле', 'status'=>'unchecked'),
    array('id'=>4, 'check'=>'Проверка размера файла robots.txt', 'status'=>'unchecked'),
    array('id'=>5, 'check'=>'Проверка указания директивы Sitemap', 'status'=>'unchecked'),
    array('id'=>6, 'check'=>'Проверка кода ответа сервера для файла robots.txt', 'status'=>'unchecked')
);

if (!curl_errno($c))
{
	if ($info['http_code'] != 200)
    {
        foreach ($arrayInfo as $one)
            $one['status'] = 'Error';
    }
    else
    {
        $arrayInfo[0]['status'] = 'OK';
        $arrayInfo[5]['status'] = 'OK';
        if ($info['size_download'] > ROBOTS_SIZE)
        {
            $arrayInfo[3]['status'] = 'Error';
        }
        else
            $arrayInfo[3]['status'] = 'OK';

    }
    $res = stristr( $content,'Sitemap');
    if ($res!='')
    {
        $arrayInfo[4]['status'] = 'OK';
    }
    elseif ($res=='')
    {
        $arrayInfo[4]['status'] = 'Error';
    }
    $res = substr_count($content, 'Host');
    if ($res == 1)
    {
        $arrayInfo[1]['status'] = 'OK';
        $arrayInfo[2]['status'] = 'OK';
    }
    elseif ($res > 1)
    {
        $arrayInfo[1]['status'] = 'OK';
        $arrayInfo[2]['status'] = 'Error';
    }
    else
    {
        $arrayInfo[1]['status'] = 'Error';
        $arrayInfo[2]['status'] = 'Error';
    }
    echo 'Took ', $info['total_time'], ' seconds for reqest to ', $info['url'], "\n";
	echo '<br>HTTP HEADER:', $info['http_code'], "\n";
	echo '<br>Data transfer size:', $info['size_download'], "\n";
	echo '<br>';
//	$result = explode('', $content);
//	print_r($result);
    echo '<pre>';
    var_dump($arrayInfo);
    echo '</pre>';
    echo '<hr>';
    echo '<pre>';
    var_dump($content);
    echo '</pre>';
}
if ($info ['http_code'] != 200)
{
	echo "Error: " . $info ['http_code'];
}
curl_close($c);
?>
</body>
</html>