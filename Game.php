<?php

/**
 * @author Valera
 * @copyright 2017
 */

function GenerateMap($height, $width)
{
    $arr=array();
    for($i=0;$i<$height;$i++)
    {
        $arr[$i]=array();
        for($j=0;$j<$width;$j++)
        {
            if(rand(0,5)==0)
            {
                $arr[$i][$j]="0";
                continue;
            }
            $arr[$i][$j]="*";
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
        default: return "";
    }
}
function PlayerInit($w, $h, &$x, &$y)
{
    $x = rand(0, $w-1);
    $y = rand(0, $h-1);
}
function IsWalkable($str)
{
    switch($str)
    {
        case "0":
        return false;

        default: return true;
    }
}
function IsCanMove($command, &$x, &$y, $map)
{
    //bounds
    if($y==0 && $command=="UP") return false;
    if($y==9 && $command=="DOWN")return false;
    if($x==0 && $command=="LEFT") return false;
    if($x==9 && $command=="RIGHT") return false;

    //walkable
    $X=$x;
    $Y=$y;
    Move($command, $X, $Y);
    if(!IsWalkable($map[$Y][$X])) return false;

    //all ok
    return true;
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
    $map = GenerateMap($W,$H);
    PlayerInit($W, $H, $X, $Y);
    $totalTime = 45;
    Screen($map, $X, $Y);
    for($t =0; $t<$totalTime; $t++)
    {
        $userInput = GetUserInput();
        if(IsCanMove($userInput, $X, $Y, $map))
        {
            Move($userInput, $X, $Y);
        }
        Screen($map, $X, $Y);
    }
}
Main();

?>
