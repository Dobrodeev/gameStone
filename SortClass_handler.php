<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 10.08.2018
 * Time: 22:00
 */
spl_autoload_register(function ($className)
{
    include $className.'.php';
});
$objectSort = new SortClass();
$objectSort->our_sort();
$objectSort->print_arr();