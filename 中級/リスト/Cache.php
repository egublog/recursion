<?php
function printArray($intArr){
    $string = "[";
    for ($i = 0; $i < count($intArr); $i++){
        $string .= $intArr[$i] . " ";
    }
    echo $string . "]" . PHP_EOL;
}

// エラトステネスのふるいのアルゴリズム
function allNPrimesSieve($n){
    // サイズnのブーリアン値trueを持つリストを生成します。キャッシュ
    $cache = array_fill(0, $n, true);

    // ステップを√n回繰り返します。nが素数でないと仮定すると、n = a * bと表すことができるので、aとbの両方が√n 以上になることはありえません。
    // したがって、√n * √n = n は最大合成組み合わせになります。
    for ($currentPrime = 2; $currentPrime <= ceil(sqrt($n)); $currentPrime++){
        // キャッシュ内の素数(p)の倍数をすべてfalseにしていきます。
        // iは2からスタートします。
        if (!$cache[$currentPrime]) continue;
        $i = 2;
        $ip = $i * $currentPrime;
        while($ip < $n){
            $cache[$ip] = false;
            # i*pをアップデートします。
            $i += 1;
            $ip = $i * $currentPrime;
        }
    }

    // キャッシュ内のすべてのtrueのインデックスは素数です。
    $primeNumbers = [];
    for($i = 2; $i < count($cache); $i++){
        $predicate = $cache[$i];
        if($predicate){
            $primeNumbers[] = $i;
        }
    }

    return $primeNumbers;
}

$answer = allNPrimesSieve(100);
printArray($answer);
echo count($answer);

// 例題
// 自然数nが与えられるので、1からnまでに含まれる素数の和を返す、sumPrimeUpToNという関数を作成

function sumPrimeUpToN($n) {
  $count = 0;
  $primeList = generatePrimeList($n);

  for ($i = 0; $i < count($primeList); $i++) {
      $count += $primeList[$i];
  }

  return $count;
}

function generatePrimeList($n) {
  $primeList = [];
  $cache = [];
  for($i = 0; $i <= $n; $i++) {
      array_push($cache, true);
  }

  for ($currentPrime = 2; $currentPrime <= ceil(sqrt($n)); $currentPrime++) {
      if (!$cache[$currentPrime]) continue;
      $i = 2;
      $ip = $i * $currentPrime;

      while ($ip <= $n) {
          $cache[$ip] = false;
          $i++;
          $ip = $i * $currentPrime;
      }
  }

  for ($i = 2; $i < count($cache); $i++) {
      if ($cache[$i]) array_push($primeList, $i);
  }

  return $primeList;
}

print(json_encode(generatePrimeList(53))) . PHP_EOL;

// 381
echo sumPrimeUpToN(53) . PHP_EOL;

// 963
echo sumPrimeUpToN(89) . PHP_EOL;

// 1060
echo sumPrimeUpToN(97) . PHP_EOL;

// キャッシュ(3)

// 末尾再帰を使って、n番目のフィボナッチを返す関数を作成します。
function fibonacciNumberTailHelper($fn1, $fn2, $n){
  if($n < 1) {
      return $fn1;
  }
  return fibonacciNumberTailHelper($fn2, $fn1+$fn2, $n-1);
}

function fibonacciNumberTail($n){
  // この関数が1つのパラメータを受け取るように、ヘルパー関数を使います。
  // そうすることによって、関数の再利用をより簡単に行うことができます。
  // 0と1からスタートします。
  return fibonacciNumberTailHelper(0,1,$n);
}

echo fibonacciNumberTail(20). PHP_EOL;

// ハッシュマップキャッシング(1)
function existsWithinList($listL,$dataY){
  $hashMap = array();

  for($i = 0; $i < count($listL);$i++){
      $hashMap[$listL[$i]] = $listL[$i];
  }
  return is_null($hashMap[$dataY]) ? false : true;
}

function printBool($bool){
  echo $bool === true ? "True" : "False" .PHP_EOL ;
}

$sampleList = [3,10,23,3,4,50,2,3,4,18,6,1,-2];
echo printBool(existsWithinList($sampleList,23)) .PHP_EOL;
echo printBool(existsWithinList($sampleList,-2)) .PHP_EOL;
echo printBool(existsWithinList($sampleList,100)) .PHP_EOL;

// TODO: 固定配列listと整数valueを受け取り、list内にあるvalueのインデックスを返す、searchListという関数をハッシュマップを使って作成。valueがlist内に複数ある場合は先に出てきたインデックスを返す。もし発見されない場合は-1を返す。

function searchList($list, $value) {
  $hashMap = array();

  for($i = 0; $i < count($list); $i++){
      if (!is_null($hashMap[$list[$i]])) continue;
      $hashMap[$list[$i]] = $i;
  }

  return !is_null($hashMap[$value]) ? $hashMap[$value] : -1;
}

$sampleList = [3,10,23,3,4,50,2,3,4,18,6,1,-2];

echo searchList($sampleList,23) . PHP_EOL; // 2

echo searchList($sampleList,-2) . PHP_EOL; // 12

echo searchList($sampleList,100) . PHP_EOL; // -1

// ハッシュマップキャッシング(2)
function printArray2($intArr){
  echo "[ ";
  for ($i = 0; $i < count($intArr); $i++){
      echo $intArr[$i] . " ";
  }
  echo "]" . PHP_EOL;
}

function linearSearchExists($haystack, $needle){
  for($i = 0; $i < count($haystack);$i++){
      if($haystack[$i] === $needle) return true;
  }
  return false;
}

function listIntersection($targetList, $searchList){
  $results = [];
  for($i=0; $i < count($searchList) ; $i++){
      if(linearSearchExists($targetList, $searchList[$i])) $results[] = ($searchList[$i]);
  }
  return $results;
}

printArray2(listIntersection([1,2,3,4,5,6],[1,4,4,5,8,9,10,11]));
printArray2(listIntersection([3,4,5,10,2,20,4,5],[4,20,22,2,2,2,10,1,4]));
printArray2(listIntersection([2,3,4,54,10,5,9,11],[3,10,23,10,0,5,9,2]));

// ハッシュマップキャッシング(3)
// 例題1
// アルファベットで構成される文字列が与えられるのでそれがパングラムかどうか判定する、isPangramという関数を作成してください。パングラムとは、a-zまでの全てのアルファベットを含んだ文字列のことを指します。

function isPangram($string) {
  $hashmap = array();
  $string = str_replace(' ', '', $string);
  $lowerString = strtolower($string);

  for ($i = 0; $i < strlen($lowerString); $i++) {
      if (is_null($hashmap[$lowerString[$i]])) $hashmap[$lowerString[$i]] = 1;
      else $hashmap[$lowerString[$i]]++;
  }

  return count($hashmap) == 26 ? true : false;
}

// True
echo (isPangram("we promptly judged antique ivory buckles for the next prize") ? "True" : "False") . PHP_EOL;

// False
echo (isPangram("sheep for a unique zebra when quick red vixens jump over the yacht") ? "True" : "False") . PHP_EOL;

// True
echo (isPangram("a quick brown fox jumps over the lazy dog") ? "True" : "False") . PHP_EOL;


// 例題2
// 文字列stringが与えられるので、全ての文字が同じ数だけ含まれているかどうか判定するfindXTimesという関数を作成してください。

function findXTimes($string) {
  $hashmap = array();
  for ($i = 0; $i < strlen($string); $i++) {
      if (is_null($hashmap[$string[$i]])) $hashmap[$string[$i]] = 1;
      $hashmap[$string[$i]]++;
  }

  foreach ($hashmap as $key => $value) {
      if ($hashmap[$key] != $hashmap[$string[0]]) return false;
  }
  return true;
}

echo (findXTimes("babacddc") ? "True" : "False") . PHP_EOL; // true

echo (findXTimes("aaabbbcccddd") ? "True" : "False") . PHP_EOL; // true

echo (findXTimes("aaabbccdd") ? "True" : "False") . PHP_EOL; // false

echo (findXTimes("zadbchvwxbwhdxvcza") ? "True" : "False") . PHP_EOL; // true

echo (findXTimes("zadbchvwxbwhdxvczb") ? "True" : "False") . PHP_EOL; // false