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

// 動的配列(3)
function printArray3($intArr){
    $outputString = "[";
    for ($i = 0; $i < count($intArr); $i++) {
        $outputString .= $intArr[$i] . " ";
    }
    echo $outputString . "]" . PHP_EOL;
}

// 初期配列を2つの項目に設定します。
$dArr = [2,3];

echo "Insert/Delete at the beginning O(n)" . PHP_EOL;
printArray3($dArr);

// 配列の先頭に要素を追加します。O(n)
//array_unshift(配列,値)関数を使います。
array_unshift($dArr,3);
//引数はいくつでも設定可能です。
array_unshift($dArr,3,43,5234,34);
printArray3($dArr);

// 最初の要素を削除します。O(n)
//array_shift(配列)関数を使います。
array_shift($dArr);
printArray3($dArr);

// インデックス2の位置にある要素を削除します。O(n)
//array_splice関数を使います。array_splice(配列、スタート、削除したい数、追加したい値)
array_splice($dArr,2, 1);
printArray3($dArr);

array_unshift($dArr,343,343,232,12,23,-23,10);
printArray3($dArr);

// 配列の途中に要素を追加します。
echo "Insert/Delete at the middle O(n)" . PHP_EOL;
array_splice($dArr, floor(count($dArr) / 2), 0, 4);
printArray3($dArr);
//array_splice()で配列のデータを追加できます。
array_splice($dArr, floor(count($dArr) / 2), 0,[343,32,23,24,12,23,98,767]);
printArray3($dArr);

// 配列の途中の要素を削除します。
array_splice($dArr, floor(count($dArr) / 2), 1);
// 配列の途中から、5つ先まで削除します。
array_splice($dArr, floor(count($dArr) / 2), 5);
printArray3($dArr);

echo "Insert/Delete at the end O(1)" . PHP_EOL;

// 配列の最後に要素を追加します。
// 1つの要素をプッシュします。
$dArr[] = 4;
array_push($dArr, 50);
printArray3($dArr);

// 配列の最後に複数要素を追加します。いくつでも可能です。
array_push($dArr, 6,3,4,54);
printArray3($dArr);

// 配列の最後を削除します。
// 1つの要素を削除します。
array_pop($dArr);
printArray3($dArr);

echo "Pop 5 from end " . PHP_EOL;

// 後ろから5つの要素を削除します。
for($i = 0; $i < 5; $i++) {
    array_pop($dArr);
}
printArray3($dArr);