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

// 動的配列を取得し，その内容を出力します。
function printArray($intArr){
    for ($i = 0; $i < count($intArr); $i++){
        echo $intArr[$i] . " ";
    }
    echo PHP_EOL;
}

// PHPの動的配列はオブジェクトではありません。PHPが配列を操るために関数と演算子を提供します。
// PHPの動的配列はすべてが自動的に処理されるので、動的配列のサイズを宣言する必要はありません。
$dArr = [2,3,4,1,-10,200];
printArray($dArr);

// 動的配列にいくつかの値を追加します。
// array_push関数は、配列の最後にデータを追加して動的配列の状態を変更するために使用されます。
// 新しい配列を作る必要も、配列のサイズを気にする必要はありません。動的配列がすべてを自動的に管理します。

array_push($dArr, 10);
array_push($dArr, 340);
array_push($dArr, 543);

// []演算子で最後にデータを追加することもできます。
$dArr[] = -23;

// dArrの新しい状態を出力します。
printArray($dArr);