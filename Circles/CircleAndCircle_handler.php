<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 14.08.2018
 * Time: 12:13
 */
require_once 'CircleAndCircle.php';
spl_autoload_register(function ($className) {
    include $className.'.php';
});
if (isset($_POST['go'])) {
    if (($_POST['circle1']['x1']) && ($_POST['circle1']['y1']) && $_POST['circle1']['r1'] &&
        ($_POST['circle2']['x2']) && ($_POST['circle2']['y2']) && $_POST['circle2']['r2']) {
        if ($_POST['circle1']['r1'] > 0 && $_POST['circle2']['r2'] > 0) {
            /**
             * echo '<pre>';
             * print_r($_POST);
             * echo '</pre>';
             */
            $x1 = $_POST['circle1']['x1'];
            $y1 = $_POST['circle1']['y1'];
            $r1 = $_POST['circle1']['r1'];
            $x2 = $_POST['circle2']['x2'];
            $y2 = $_POST['circle2']['y2'];
            $r2 = $_POST['circle2']['r2'];

            $circleObject1 = new CircleAndCircleClass($x1, $y1, $r1);
//            $circleObject1->setCircle($x1, $y1, $r1);

            $circleObject2 = new CircleAndCircleClass($x2, $y2, $r2);
//            $circleObject2->setCircle($x2, $y2, $r2);


            echo '<span style="color: blue">Всего точек пересечения: '.$circleObject1->countIntersections($circleObject2).'</span><br>';
        } else {
            $result = 'Введите корректныые радиусы. <br>';
            echo "<span style='color:red;'>$result</span>";
        }
    } else {
        $result = 'Введите все данные.<br>';
        echo '<span style="color: red">'.$result.'<span>';
    }
}
