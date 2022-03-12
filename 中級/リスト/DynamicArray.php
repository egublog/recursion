<?php 

function printIntArray($intArray)
{
    for($i = 0; $i < count($intArray); $i++){
        echo $intArray[$i] . " ";
    }
    echo PHP_EOL;
}

$arr = [20, 13, -12, 2, 5];
printIntArray($arr);