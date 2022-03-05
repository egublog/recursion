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

function printArray($arr){
  for ($i = 0; $i < count($arr); $i++){
      echo $arr[$i];
  }
  echo ''. PHP_EOL;
}

$doubleArr = [34.5,34.4,23,54.3];
$charArr = ['h','e','l','l','o'];
$stringArr = ["The race is starting.", "A dog just escaped", "The company ran out of business"];

printArray($doubleArr);
printArray($charArr);
printArray($stringArr);