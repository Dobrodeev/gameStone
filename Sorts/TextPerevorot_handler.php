<?php
/*echo '<pre>';
print_r($_POST);
echo '</pre>';*/
$text = $_POST['text'];
$index = $_POST['index'];
function revolutionString($text, $index)
{
    return substr($text, 0, $index - 1).strrev(substr($text, $index - 1));
}

echo '-Было: '.$text.'<br>';
echo 'Стало: '.revolutionString($text, $index).'<br>';