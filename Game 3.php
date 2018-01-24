<?php

/**
 * @author Valera
 * @copyright 2017
 */
function RandUnitFrom($units)
{
    //$units=array("Player1","Player2","Player3","Player4","Player5");
    //$unit_wins=array(0,0,0,0,0);
    $index_rand=rand(0,count($units)-1);
    $rand_player=$units[$index_rand];
    return $rand_player;
}
function GetNumber($player, $players)
{
    for($i=0; $i<count($players); $i++)
    {
        if($players[$i]==$player)
            return $i;
    }
}
function SaveWin($res,&$unit_wins, $player1, $player2, $players)
{
    if($res=="Unit1 win") $unit_wins[GetNumber($player1, $players)]++;
    elseif($res=="Unit2 win") $unit_wins[GetNumber($player2, $players)]++;
}
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
function RandRes()
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
function IsEndGame($wins, $max_win)
{
    foreach($wins as $n)
        if($n>=$max_win)
            return true;

    return false;
}
function ShowStats($wins, $player1, $player2, $players)
{
    for($i=0; $i<count($players); $i++)
    {
        print($i." ".$wins[$i]." ");
        $i1 =GetNumber($player1, $players);
        $i2 =GetNumber($player2, $players);
        print( (($i==$i1) || ($i==$i2)) ? " *** " : "     ");
        print("<br>");
    }
}
function Main()
{
    $NumberOfPlayers = rand(4, 10);

    //init
    $players = array();
    $wins = array();
    for($i=0; $i<$NumberOfPlayers; $i++)
    {
        $players[$i] = "Player".($i+1);
        $wins[$i] = 0;
    }
    $NeedsWins = 7;

    //game
    $Rounds = 0;
    do
    {
        $Rounds++;
        print("<br><br>Round".$Rounds."<br>");
        $player1 = RandUnitFrom($players);
        $player2;
        do
        {
           $player2 = RandUnitFrom($players);
        }
        while($player2==$player1);
        print($player1."  vs ".$player2."<br>");
        $u1=RandRes();
        $res = CompareUnits($u1[0],$u1[1]);
        SaveWin($res, $wins, $player1, $player2, $players);
        print($res."<br>");
        ShowStats($wins, $player1, $player2, $players);
    }
    while(!IsEndGame($wins, $NeedsWins));
}
Main();

?>
