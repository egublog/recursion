<?php
class Node
{
    public $data;
    public $next;
    public $prev;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

// 両端キューのこと
class Deque
{
    public $head;
    public $tail;

    public function peekFront()
    {
        if($this->head === null) return null;
        return $this->head->data;
    }

    public function peekBack()
    {
        if($this->tail === null) return $this->peekFront();
        return $this->tail->data;
    }

    public function enqueueFront($data)
    {
        if($this->head === null){
            $this->head = new Node($data);
            $this->tail = $this->head;
        }
        else{
            $node = new Node($data);
            $this->head->prev = $node;
            $node->next = $this->head;
            $this->head = $node;
        }
    }

    public function enqueueBack($data)
    {
        if($this->head === null){
            $this->head = new Node($data);
            $this->tail = $this->head;
        }
        else{
            $node = new Node($data);
            $this->tail->next = $node;
            $node->prev = $this->tail;
            $this->tail = $node;
        }
    }

    public function dequeueFront()
    {
        if($this->head === null) return null;

        $temp = $this->head;
        $this->head = $this->head->next;
        if($this->head != null) $this->head->prev = null;
        else $this->tail = null;
        return $temp->data;
    }

    public function dequeueBack()
    {
        if($this->tail === null) return null;

        $temp = $this->tail;
        $this->tail = $this->tail->prev;

        if($this->tail !== null) $this->tail->next = null;
        else $this->head = null;
        return $temp->data;
    }
}

$q = new Deque();
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

$q->enqueueBack(4);
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

$q->enqueueBack(50);
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

echo "dequeued :" . $q->dequeueFront() .PHP_EOL;
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

$q->enqueueFront(36);
$q->enqueueFront(96);
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

echo "dequeued :" . $q->dequeueBack() .PHP_EOL;
echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

echo "Emptying" .PHP_EOL;
$q->dequeueBack();
$q->dequeueBack();
$q->dequeueBack();
$q->dequeueBack();

echo $q->peekFront() .PHP_EOL;
echo $q->peekBack() .PHP_EOL;

// リストの最大値を求める
function getMax($arr){
  $deque = new Deque();
  $deque->enqueueFront($arr[0]);

  for($i = 1; $i < count($arr); $i++){
      if($arr[$i] > $deque->peekFront()) $deque->enqueueFront($arr[$i]);
      else $deque->enqueueBack($arr[$i]);
  }

  return $deque->peekFront();
}

echo getMax([34,35,64,34,10,2,14,5,353,23,35,63,23]) .PHP_EOL;

// 配列と整数 k が与えられたとき、サイズ k の連続する部分配列の最大値
// NOTE: スライディングウィンドウという有名な方法で解ける
function getMaxWindows($arr, $k)
{
  if($k > count($arr)) return [];

  $results = [];
  $deque = new Deque();

  for($i = 0; $i < $k; $i++){
      while($deque->peekBack() !== null && $arr[$deque->peekBack()] <= $arr[$i]){
          $deque->dequeueBack();
      }
      $deque->enqueueBack($i);
  }


  for($i = $k; $i < count($arr); $i++){
      array_push( $results,$arr[$deque->peekFront()]);

      while($deque->peekFront() !== null && $deque->peekFront() <= $i-$k) $deque->dequeueFront();


      while($deque->peekBack() !== null && $arr[$deque->peekBack()] <= $arr[$i]) $deque->dequeueBack();
      $deque->enqueueBack($i);
  }

  array_push($results, $arr[$deque->peekFront()]);


  return $results;
}

print(json_encode(getMaxWindows([34,35,64,34,10,2,14,5,353,23,35,63,23], 4))) .PHP_EOL; // [64,64,64,34,14,353,353,353,353,63]