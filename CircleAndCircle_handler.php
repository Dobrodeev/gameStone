<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 14.08.2018
 * Time: 12:13
 */
require_once 'CircleAndCircle.php';
spl_autoload_register(function ($className)
{
    include $className.'.php';
});
if (isset($_POST['go']))
{
    if ($_POST['circle1']['x1'] && $_POST['circle1']['y1'] && $_POST['circle1']['r1'] && $_POST['circle2']['x2'] && $_POST['circle2']['y2'] && $_POST['circle2']['r2'])
    {
        if ($_POST['circle1']['r1'] > 0 && $_POST['circle2']['r2'] > 0)
        {
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            /**
            $circle1 = implode(',',$_POST['circle1']);
            $circle2 = implode(',', $_POST['circle2']);
            echo '(x1, y1, r1): ('.$circle1.')<br>';
            echo '(x2, y2, r2): ('.$circle2.')<br>';
             */
            $x1 = $_POST['circle1']['x1'];
            $y1 = $_POST['circle1']['y1'];
            $r1 = $_POST['circle1']['r1'];
            $x2 = $_POST['circle2']['x2'];
            $y2 = $_POST['circle2']['y2'];
            $r2 = $_POST['circle2']['r2'];
            $circleObject = new CircleAndCircleClass();
            $circleObject->getCircle1($x1, $y1, $r1);
            $circleObject->getCircle2($x2, $y2, $r2);
            $circleObject->countIntersections();
            echo 'Всего точек пересечения: '.$circleObject->countPoints.'<br>';
        }
        else
        {
            $result = 'Введите корректныые радиусы. <br>';
            echo $result;
        }
    }
    else
    {
        $result = 'Введите все данные.<br>';
        echo $result;
    }
}