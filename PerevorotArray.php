<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 17.01.2019
 * Time: 12:46
 */

class PerevorotArray
{
    private $routes;// здесь уже массив
/***/
    public function __construct()
    {
//        $routesPath = ROOT.'/config/routes.php';//здесь уже массив
//        $this->routes = include($routesPath);
        echo 'Вызов конструктора <br>';;
    }

    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))// если наш адрес не пуст после слеша
        {
            return trim($_SERVER['REQUEST_URI'],'/');// все что до слеша удаляем
        }
    }

    public function run()
    {
        $uri=$this->getURI();
//        echo $uri.'<br>';// адресная строка
//        echo '<pre>';
//        print_r($this->routes);
//        echo '</pre>';
        $this->routes = array(
            'cart'=>'cart/view',// обращаемся к классу cartController & к методу view
            'news/([0-9]+)' => 'news/view/$1',// обращаемся к классу newsController и к методу actionView к конкретному номеру новости
            '' => 'news/index',// обращаемся к классу newsController и к методу actionIndex для вывода всех новостей
        );
        foreach ($this->routes  as $uriPattern=>$path)
        {
            if(preg_match("~$uriPattern~",$uri))
            {
                $internalRoute=preg_replace("~$uriPattern~",$path,$uri);// news/view/$1
                // подключаем роуты
                $segment=explode('/',$internalRoute);// news view $1
//                echo '<pre>';
//                print_r($segment);
//                echo '</pre>';
//                [0] => news
//                [1] => index
                $controllername=array_shift($segment).'Controller';// newsController
                $controllername=ucfirst($controllername);// NewsController
                $actionname='action'.ucfirst(array_shift($segment));// первую букву делаем большой: actionIndex()
                // подключать готовые actionIndex() или actionView()
                $parametr = $segment;
                $controllerfile = ROOT.'/controllers/'.$controllername.'.php'; // адрес на NewsController.php
                if (file_exists($controllerfile)) // существует ли файл NewsControlle
                {
                    include_once ($controllerfile);
                }
                $controllerobject = new $controllername;
                // вызываем обратную функцию, в $parametr № новости
                $result = call_user_func_array(array($controllerobject, $actionname), $parametr);
                if ($result != null)
                {
                    break;
                }
            }
        }
    }
    public function perevorotTexta($getText)
    {
        echo 'Просто текст: <br>';
        echo $getText.'<br>';
        echo 'Уменьшеный текст <br>';
        echo strtoupper($getText).'<br>';
        echo 'Увеличенный текст: <br>';
        echo strtolower($getText).'<br>';
        echo 'Текст с большой буквы: <br>';
        echo ucfirst($getText).'<br>';
        $explodeText = explode(' ',$getText);
        echo '<pre>';
        print_r($explodeText);
        echo '</pre>';
        $count = 150;
        $Summa = 0;
        for ($i = 1; $i < $count; $i++)
        {
            $Summa += 1/$i;
        }
        echo 'Сумма '.$count.' первых членов гармонического ряда = '.$Summa.'<br>';
        $exampleArray = [1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597];
        foreach ($exampleArray as $item)
        {
            echo $item.' ';
        }
        echo '<br>';
    }

    public function perevorotString($text, $index)
    {
        echo 'Текст до преобразования: <br>';
        echo $text.'<br>';
    //    $first = substr($text, 0, $index - 1);
    //    $temp = substr($text, $index - 1);
    //    $perevorot = strrev($temp);
    //    $result = $first.$perevorot;
    //    echo $result;
        echo 'Текст после преобразования: <br>';
        return substr($text, 0, $index-1) . strrev(substr($text, $index-1));
    }
    public function fib ($n)
    { // a function called fib, declaire variable n (the sequence number)
        for ($n=0;$n<30;$n++)
        {
            if ($n < 3)
            {
                return $n;
            } // if n is smaller than 3 return n (1 or 2)
            else
                {
                    return fib ($n - 1) + fib ($n - 2);
                }
            /* if the number is 3 or above do 2 sums (n-1) and (n-2)
            and then add the 2 sums together (n-1)+(n-2)
            Example Fibonacci number 4
            (4-1)+(4-2) = 5
            3 + 2 = 5
            */
        }
        print $n;
    }

    public function clear($text)
    {
        $text = trim($text);
        $text = htmlspecialchars($text);
        $text = stripcslashes($text);
        $text = strip_tags($text);
        return $text;
    }

    public function factorialFor($n)
    {
        if ($n < 0) return 0;
        if ($n == 0) return 1;
        $f = 1;

        for($i=1; $i<=$n; $i++)
        {
            $f = $f*$i;
        }

        return $f;
    }

    public function recFactorial($n)
    {
        if ($n < 0) return 0;
        if ($n == 0) return 1;
        $f = 1;

        for($i=1; $i<=$n; $i++)
        {
            $f = $f*$i;
        }

        return $f;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo 'Вызов деструктора. <br>';
    }
}