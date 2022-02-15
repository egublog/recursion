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