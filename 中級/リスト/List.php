<?php

// リスト
$str = "Hello World!";

for($i = 0; $i < strlen($str); $i++) {
    echo $str[$i]. PHP_EOL;
}

// 整数のリスト
function printIntArray($intArr)
{
  for ($i = 0; $i < count($intArr) ; $i++){
      echo $intArr[$i]. PHP_EOL;
  }
}

$arr1 = [40,3,22,-2,4,8];
printIntArray($arr1);

$arr1[3] = 34;
$arr1[1] = 40;
printIntArray($arr1);