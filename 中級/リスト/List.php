<?php

// リスト
$str = "Hello World!";

for($i = 0; $i < strlen($str); $i++) {
    echo $str[$i]. PHP_EOL;
}

// 配列(1)
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


// 配列(2)
function isEven($n){
  return $n % 2 == 0;
}

// 整数の配列を取り込んで、偶数が何個あるかを調べます。
function totalEven($listOfInts){
  $count = 0;
  for($i = 0; $i < count($listOfInts); $i++){
      $count += isEven($listOfInts[$i]) ? 1 : 0;
  }
  return $count;
}

$list1 = [3,43,5,4,2,100,6];

$totalEvens = totalEven($list1);
echo $totalEvens . PHP_EOL;


// 例題1
// 整数によって構成される配列が与えられるので、配列内の全ての要素を足し合わせた数値を返す、sumArrayElementという関数を作成してください。
// [3,43,5,4,2,100,6] --> 163
// [1,2,3,4,5,6] --> 21
// [32,21,10,3,5,6] --> 77
function sumArrayElement($arr){
  $sum = 0;
  for($i = 0; $i < count($arr); $i++){
      $sum += $arr[$i];
  }
  return $sum;
}


// 例題2
// 整数によって構成される配列が与えられるので、配列内の最大値を返す、maxValueという関数を作成してください。
// [3,43,5,4,2,100,6] --> 100
// [1,2,3,4,5,6] --> 6
// [32,21,10,3,5,60,18,32,] --> 60
function maxValue($arr){
  $max = $arr[0];
  for($i = 1; $i < count($arr); $i++){
      if($max < $arr[$i]){
          $max = $arr[$i];
      }
  }
  return $max;
}