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

$dArr[] = 4;
array_push($dArr, 50);
printArray3($dArr);

array_push($dArr, 6,3,4,54);
printArray3($dArr);

array_pop($dArr);
printArray3($dArr);

echo "Pop 5 from end " . PHP_EOL;

// 後ろから5つの要素を削除する
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

// 2次元配列(3)
class Student {
    public $studentId;
    public $firstName;
    public $lastName;
    public $gradeLevel;

    function __construct($studentId, $firstName, $lastName, $gradeLevel){
        $this->studentId = $studentId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gradeLevel = $gradeLevel;
    }

    function getFullName(){
        return $this->firstName . " " . $this->lastName;
    }
}

class Classroom {
    public $students;
    public $courseName;
    public $period;
    public $roomNumber;
    public $teacher;

    function __construct($students, $courseName, $period, $roomNumber, $teacher){
        $this->students = $students;
        $this->courseName = $courseName;
        $this->period = $period;
        $this->roomNumber = $roomNumber;
        $this->teacher = $teacher;
    }

    function getClassIdentity(){
        return $this->courseName . " room " . $this->roomNumber . " during period " . $this->period . " managed by " . $this->teacher;
    }

    function getNumberOfStudents(){
        return count($this->students);
    }
}

function printSchoolSchedule($classrooms){
    for ($i = 0; $i < count($classrooms); $i++){
        $classroom = $classrooms[$i];
        echo $classroom->getClassIdentity(). PHP_EOL;
        $studentString = "";
        for ($j = 0; $j < count($classroom->students)-1; $j++){
            $student = $classroom->students[$j];
            $studentString .= $student->getFullName() . ",";
        }
        $studentString .= $classroom->students[$classroom->getNumberOfStudents()-1]->getFullName();
        echo "Student list: " . $studentString. PHP_EOL;
    }
}

$classroom1 = new Classroom([new Student("AC-343424","Vincent", "Lynch",10), new Student("AC-343434","Violet", "Marshall",10),new Student("AC-343428","Aubree", "Lambert",10),new Student("AC-343454","Danny", "Robertson",10)], "Algebra II", 2, 23, "Emily Theodore");
$classroom2 = new Classroom([new Student("AC-340014","Kent", "Carter",11), new Student("AC-340024","Isaiah", "Chambers",11),new Student("AC-340018","Leta", "Ferguson",11)], "English", 5, 104, "Daniel Pherb");

$classroom3 = new Classroom([new Student("AC-330010","Glenda", "Soto",12), new Student("AC-330035","Johnny", "Robertson",12),new Student("AC-330020","Ava", "Hansen",12), new Student("AC-340084","Nathaniel", "Romero",11)], "Biology", 5, 36, "Maki Watanabe");

$school = [$classroom1, $classroom2, $classroom3];
printSchoolSchedule($school);

// 多次元配列

$array3d = [[[3,4,3],[4,7,8]],[[1,3,5],[2,7,8]],[[1,2,3],[9,7,8]]];

echo $array3d[2][1][0]. PHP_EOL;

$array4d = [[[[3,3],[4,3],[9,3]],[[6,5],[8,3],[9,3]]],[[[3,3],[4,3],[9,3]],[[6,5],[8,3],[9,3]]],[[[3,3],[4,3],[9,3]],[[6,5],[8,3],[9,3]]]];

echo $array4d[2][1][2][1]. PHP_EOL;

function print3dArray($rank3Array){
    for ($i = 0; $i < count($rank3Array); ++$i) {
        echo "[";
        for ($j = 0; $j < count($rank3Array[$i]); ++$j){
            echo "[";
            for ($k = 0; $k < count($rank3Array[$i][$j]); ++$k){
                echo $rank3Array[$i][$j][$k] . "-";
            }
            echo "]";
        }
        echo "]";
    }
    echo ''. PHP_EOL;
}

function print4dArray($rank4Array){
    for ($i = 0; $i < count($rank4Array); ++$i) {
        echo "[";
        for ($j = 0; $j < count($rank4Array[$i]); ++$j){
            echo "[";
            for ($k = 0; $k < count($rank4Array[$i][$j]); ++$k){
                echo "[";
                for ($l = 0; $l < count($rank4Array[$i][$j][$k]); ++$l){
                    echo $rank4Array[$i][$j][$k][$l] . "-";
                }
                echo "]";
            }
            echo "]";
        }
        echo "]";
    }
    echo ''. PHP_EOL;
}

// 3次元配列
$array3d = [[[3,4,3],[4,7,8]],[[1,3,5],[2,7,8]],[[1,2,3],[9,7,8]]];
echo "printing 3d array...". PHP_EOL;
print3dArray($array3d). PHP_EOL;


// 4次元配列
$array4d = [[[[3,3],[4,3],[9,3]],[[6,5],[8,3],[9,3]]],[[[3,3],[4,3],[9,3]],[[6,5],[8,3],[9,3]]],[[[3,3],[4,3],[9,3]],[[6,5],[8,3],[9,3]]]];
echo "printing 4d array...". PHP_EOL;
echo $array4d[2][1][2][1]. PHP_EOL;
print4dArray($array4d). PHP_EOL;

// 4次元リストを返します。[[[[char,char,char,char]]]]
// 棚を含む配列、本の配列を含む棚、名言の配列を含む本、文字の配列を含む名言
function myLibraryQuotes(){
    // 本棚1の本
    $book1Quotes = [
        "Let all of life be an unfettered howl.",
        "Our lives were just beginning, our favorite moment was right now, our favorite songs were unwritten.",
        "You were born to stand out, stop trying to fit in.",
        "Do not wait for the last judgment. It comes every day.",
    ];

    $book2Quotes = [
        "It is not a religion. It is a relationship.",
        "The choice is yours. Don't let your pronouncements destroy your destiny rather let them build your future up!",
        "Poetry is born; When the relationships begin to melt on the slow flame of the eyes.",
        "Fatherhood is sacred."
    ];

    $book3Quotes = [
        "Marriage is a partnership; not a sole proprietorship.",
        "She was soft rock that suddenly turned hard.",
        "A human is the one, who would give up a thousand Cleopatras to be with the person he or she loves.",
        "You read between the wrong lines."
    ];

    $bookshelf1 = [$book1Quotes, $book2Quotes, $book3Quotes];

    // 本棚2の本
    $book4Quotes = [
        "Everything you want in life is a relationship away.",
        "Life!Even though it's black and white, it's still fairly colorful.",
        "To question reason is to trust it.",
        "La prueba de ausencia no es prueba de ausencia",
        "Not how the world is, but that it is, is the mystery.",
    ];

    $book5Quotes = [
        "Confuse them with your silence. Shock them with your results.",
        "All statistics have outliers.",
        "The moon fascinates us in her simplicity.",
        "Anything you're good at contributes to happiness."
    ];

    $book6Quotes = [
        "Confuse them with your silence. Shock them with your results.",
        "All statistics have outliers.",
        "The moon fascinates us in her simplicity.",
        "Anything you're good at contributes to happiness."
    ];

    $book7Quotes = [
        "Don't write to sell, write to tell.",
        "Slowly we became silent, and silence itself if an enemy to friendship.",
        "Without the sun I am cold.Without your smile I am lost.",
        "You are the softness of the morning dew!"
    ];

    $bookshelf2 = [$book4Quotes, $book5Quotes, $book6Quotes, $book7Quotes];

    // 本棚3の本
    $book8Quotes = [
        "The Heart wants what it wants - or else it does not care",
        "You have a beautiful laugh. Like the promise of tomorrow.",
        "You'll never be able to let him go. You'll always feel wrong about being with me."
    ];

    $book9Quotes = [
        "The voice of Love seemed to call to me, but it was a wrong number.",
        "Do not allow me to forget you",
        "Education consists mainly of what we have unlearned."
    ];

    $book10Quotes = [
        "LIFE - Death's Very Emissary",
        "To conquer fear, you must become fear.",
        "Meditation is the energy of the mind,"
    ];

    $bookshelf3 = [$book8Quotes, $book9Quotes, $book10Quotes];
    return [$bookshelf1, $bookshelf2, $bookshelf3];
}

function libraryQuotePrinter($libraryArray){
    for ($i = 0; $i < count($libraryArray); $i++){
        for ($j = 0; $j < count($libraryArray[$i]); $j++) {
            for ($k = 0; $k < count($libraryArray[$i][$j]); $k++) {
                $quoteParsed = "";
                for ($l = 0; $l < strlen($libraryArray[$i][$j][$k]); $l++) {
                    $quoteParsed .= "-" . $libraryArray[$i][$j][$k][$l];
                }
                $quoteParsed .= "";
                echo $quoteParsed . PHP_EOL;
            }
        }
    }
}

$library4dList = myLibraryQuotes();
libraryQuotePrinter($library4dList);

// 探索

function needleInHaystack($haystack, $needle){
    // 針を見つけるために、個々の要素を見ていきます。
    // この検索は、O(n)の時間がかかります。
    for ($i = 0; $i < count($haystack); ++$i) {
        if($haystack[$i] == $needle){
            return $i;
        }
    }
    return -1;
}

function printAtIndex($index, $words){
    if ($index >= 0 && $index < count($words)){
        echo "Printing: ->" . $words[$index] . "<- at index: " . $index. PHP_EOL;
    } else {
        echo "Index out of scope!". PHP_EOL;
    }
}

// 文字列の配列を作成します。
$words = ["Take", "Restaurant", "Family", "Running", "Tea", "Apples"];

// "Running"という文字列を配列の中から探します。
printAtIndex(needleInHaystack($words, "Running"), $words);

// "Apple"という文字列を配列の中から探します。
printAtIndex(needleInHaystack($words, "Apples"), $words);

// "Train"という存在しない文字列を配列の中から探します。
printAtIndex(needleInHaystack($words, "Train"), $words);

// 連想配列
function simpleHash($inputString){
    $numberRepresentation = 0;
    for ($i = 0; $i < strlen($inputString); $i++){
        # ord(char)は、文字の整数値を返します。
        $numberRepresentation += ord($inputString[$i]);
    }
    return $numberRepresentation;
}

echo simpleHash("aaaa"). PHP_EOL;