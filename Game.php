<?php

/**
 * @author Valera
 * @copyright 2017
 */


function Array2($height, $width)
{
    $arr=array();
    for($i=0;$i<$height;$i++)
    {
        $arr[$i]=array();
        for($j=0;$j<$width;$j++)
        {
            $arr[$i][$j]=0;
        }
    }
    return $arr;
}
function Screen($arr, $x, $y)
{
    for($i=0; $i<count($arr); $i++)
    {
        for($j=0;$j<count($arr[$i]);$j++)
        {   
            if($i==$y && $j==$x)
            {
                print("#");
                continue;
            }
            print($arr[$i][$j]);
        }
        print("<br>");
    }
    print("<br><br><br>");
}
function GetUserInput()
{
    $rand=rand(0,3);
    switch($rand)
    {
        case 0: return "UP";
        case 1: return "DOWN";
        case 2: return "LEFT";
        case 3: return "RIGHT";
    }
    return "";
}
function PlayerInit($w, $h, &$x, &$y)
{
    $x = rand(0, $w-1);
    $y = rand(0, $h-1);
}
function Move($command, &$x, &$y)
{
    switch($command)
    {
        case "UP":
            $y--;
            break;
        case "DOWN":
            $y++;
            break;
        case "LEFT":
            $x--;
            break;
        case "RIGHT":
            $x++;
            break;
    }
}
function Main()
{
    $W = 10;
    $H = 10;
    $map = Array2($W,$H);
    PlayerInit($W, $H, $X, $Y);
    $totalTime = 45;
    Screen($map, $X, $Y);
    for($t =0; $t<$totalTime; $t++)
    {
        $userInput = GetUserInput();
        Move($userInput, $X, $Y);
        Screen($map, $X, $Y);
    }
}
Main();
?>