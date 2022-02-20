<?php
// 7 × n を計算する関数
// 自身を使って定義する再帰的処理
function multipleOf7($n)
{
   // n が 0 になったら 0 を返します
   if ($n <= 0) {
       return 0;
   }
   // 7 × n は {7 × (n-1)} + 7 と書き換え可能
   return multipleOf7($n-1) + 7;
}
 
// 7 × 3 の計算
echo multipleOf7(5) . PHP_EOL;
 
// 7 × 11 の計算
echo multipleOf7(11) . PHP_EOL;