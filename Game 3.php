<?php

/**
 * @author Valera
 * @copyright 2017
 */
 function ConsoleReadln()
{        
        switch($x)
        {
            case 0: 
            $variant=0;// Ножницы
            break;
            case 1:
            $variant=1;// Бумага
            break;
            case 2:
            $variant=2;// Колодец
            break;
        }
}
function ConsoleWriteln($unit1)
{
        switch($unit1)
        {
            case 0: 
            print("Ножницы <br>");// Ножницы
            break;
            case 1:
            print("Бумага <br>");// Бумага
            break;
            case 2:
            print("Колодец <br>");// Колодец
            break;
        }
}
function RandUsers()
{
    $unit1=rand(0,2);
    $unit2=rand(0,2);
    //print("unit1=".$unit1."<br>");
    //print("unit2=".$unit2."<br>");\
    ConsoleWriteln($unit1);
    ConsoleWriteln($unit2);
    return array($unit1,$unit2);
    //list($unit1,$unit2)=RandUsers();
}
//RandUsers();

//ConsoleReadln()

//ConsoleWriteln(1,0);
function CompareUnits($Unit1,$Unit2)
{
    if($Unit1==$Unit2) return "Draw";
    elseif($Unit1==0 && $Unit2==1) return "Unit1 win";
    elseif($Unit1==0 && $Unit2==2) return "Unit2 win";
    elseif($Unit1==1 && $Unit2==0) return "Unit2 win";
    elseif($Unit1==1 && $Unit2==2) return "Unit1 win";
    elseif($Unit1==2 && $Unit2==0) return "Unit1 win";
    elseif($Unit1==2 && $Unit2==1) return "Unit2 win";
    return "no any fjbjfbjhbjhjhb here";
}
function Main()
{
    $u1=RandUsers();
    $res = CompareUnits($u1[0],$u1[1]);
    print($res."<br>");
}
Main();
?>