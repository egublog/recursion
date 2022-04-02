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