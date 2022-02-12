<?php

// 片方向リスト(singly-linked list)
class Node {
    public $data;
    public $next;

    public function __construct($data){
        $this->data = $data;
    }
}

class SinglyLinkedList{
    public $head;

    public function __construct($head){
        $this->head = $head;
    }
}

$arr = [35,23,546,67,86,234,56,767,34,1,98,78,555];
$numList = new SinglyLinkedList(new Node($arr[0]));

$currentNode = $numList->head;
for($i = 1; $i < count($arr); $i++){
    $currentNode->next = new Node($arr[$i]);
    $currentNode = $currentNode->next;
}

$currentNode = $numList->head;
while($currentNode !== null){
    echo $currentNode->data . PHP_EOL;
    $currentNode = $currentNode->next;
}
