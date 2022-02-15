<?php
// 二分木
class BinaryTree
{
    public $data;
    // 左二分木
    public $left;
    // 右二分木
    public $right;

    public function __construct($data, $left = null, $right = null)
    {
        $this->data = $data;
        $this->left = $left;
        $this->right = $right;
    }
}

$binaryTree = new BinaryTree(1);
$node2 = new BinaryTree(2);
$node3 = new BinaryTree(3);

$binaryTree->left = $node2;
$binaryTree->right = $node3;

print("Root: " . $binaryTree->data . PHP_EOL);
print("Left: " . $binaryTree->left->data . PHP_EOL);
print("Right: " . $binaryTree->right->data . PHP_EOL);

// 二分探索木
// NOTE: 完全二分木の高さがlog2(n)であるという性質を持つ
function linearSearch($key, $haystack){
  for($i = 0; $i < count($haystack); $i++){
      if($key === $haystack[$i]) return $i;
  }
  return -1;
}

$l1 = [3,4,2,5,46,23,3,55,67,24,65];
echo(linearSearch(5, $l1)). PHP_EOL;
echo(linearSearch(24, $l1)). PHP_EOL;