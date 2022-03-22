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

// オブジェクトの状態と配列

class Animal{
    public $species;
    public $weightKg;
    public $heightM;
    public $predator;

    function __construct($species, $weightKg, $heightM, $predator){
        $this->species = $species;
        $this->weightKg = $weightKg;
        // 動物が立ち上がることを仮定すると、高さは最大の寸法になります。
        $this->heightM = $heightM;
        $this->predator = $predator;
    }

    function domesticate(){
        $this->predator = false;
    }
}

function printAnimal($animal){
    echo "The animal species is: " . $animal->species . ". It's weight is: " . $animal->weightKg . "kg and its height is: " . $animal->heightM . "m. " . (($animal->predator) ? "It is a predator!" : "It is a peaceful animal."). PHP_EOL;
}

$tiger1 = new Animal("Tiger", 290, 2.6, true);
$bear1 = new Animal("Bear", 250, 2.8, true);
$snake1 = new Animal("Snake", 250, 12.8, true);
$dog1 = new Animal("Dog", 90, 1.2, false);
$cat1 = new Animal("Cat", 40, 0.5, false);
$cow1 = new Animal("Cow", 1134, 1.5, false);
// 何か他の動物を作成してみましょう。

printAnimal($tiger1);
printAnimal($bear1);
printAnimal($cat1);

echo "Time to tame the tiger...". PHP_EOL;
// tigerの状態を捕食者から変えてみましょう。
$tiger1->domesticate();
printAnimal($tiger1);

// 2次元配列(1)
function print2dArray($array2d){
    for ($i = 0; $i < count($array2d); $i++){
        $arr = $array2d[$i];
        for ($j = 0; $j < count($arr); $j++){
            echo $arr[$j]. PHP_EOL;
        }
    }
}

$array2d = [[1,2,3],[4,5,6],[7,8,9]];
print2dArray($array2d);

// 2次元配列(2)
function getTotalForProductList($product2dPriceList){
    $finalTotal = 0;
    for ($i = 0; $i < count($product2dPriceList); $i++){
        $priceList = $product2dPriceList[$i];
        $price = $priceList[0];
        $total = $price;
        // 最初の値の後に開始
        for ($j = 1; $j < count($priceList); $j++){
            $multiplier = $priceList[$j];
            $total += $price * $multiplier;
        }
        // finalTotalを足していきます。
        echo "Total for current item is:" . ($total). PHP_EOL;
        $finalTotal += $total;
    }
    return $finalTotal;
}

// 商品の配列
$product1 = [100, 0.1, 0.02, 0.03, 0.02];
$product2 = [50, -0.5, 0.1, 0.05, 0.02];
$product3 = [34, 0.05, 0.2, 0.03, 0.1];
$product4 = [10, -0.2, 0.3, 0.05, 0.03];

// Shopping cartは全てのアイテムを含んでいます。2次元配列。
$shoppingCartArray = [$product1, $product2, $product3, $product4];
echo getTotalForProductList($shoppingCartArray). PHP_EOL;


// 例題
// 二次元配列が与えられるので、最大値を返す、maxValueという関数を作成してください。

// [[1,1,2,3,2], [5,5,1,5,2], [3,5,2,3,1], [1,2,3,6,3]] -> 6
// [[0,9,1,4,5], [1,3,3,4,7], [11,12,34,81,12], [12,24,63,76,13]] -> 81
// [[-2,39,94,12,49], [11,35,84,21,32], [157,243,121,23,33], [11,43,65,84,29]] -> 243