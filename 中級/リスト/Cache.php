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