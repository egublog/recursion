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

// 動的配列を取得し，その内容を出力する
function printArray($intArr){
    for ($i = 0; $i < count($intArr); $i++){
        echo $intArr[$i] . " " . PHP_EOL;
    }
}

// PHPの動的配列はオブジェクトではない。
// PHPの動的配列はすべてが自動的に処理されるので、動的配列のサイズを宣言する必要はない。
$dArr = [2,3,4,1,-10,200];
printArray($dArr);

// 新しい配列を作る必要も、配列のサイズを気にする必要はありません。動的配列がすべてを自動的に管理する。
array_push($dArr, 10);
array_push($dArr, 340);
array_push($dArr, 543);

$dArr[] = -23;

printArray($dArr);