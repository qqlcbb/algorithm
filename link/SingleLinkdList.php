<?php

/**
 * @title 单链表节点
 */
class SingleLinkedListNode 
{
    /**
     * 节点中的数据域
     * @var null
     */
    public $data;

    /**
     * 节点中的指针域名，指向下一个节点
     * @var [type]
     */
    public $next;

    /**
     * [__construct description]
     * @param [type] $data [description]
     */
    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}

/**
 * @title 单链表
 */
class SingleLinkedList
{

    /**
     * 头节点（哨兵节点）
     * @var [type]
     */
    public $head;

    /**
     * 链表长度
     * @var [type]
     */
    public $length;

    /**
     * 初始化链表
     * @param [type] $head [description]
     */
    public function __construct($head = null)
    {
        if ($head == null) {
            $this->head = new SingleLinkedListNode();
        } else {
            $this->head = $head;
        }

        $this->length = 0;
    }

    /**
     * 输出单链表
     * @return [type] [description]
     */
    public function printListSimple()
    {
        if ($this->head == null || $this->head->next == null) {
            return false;
        }

        $curNode = $this->head;
        while ($curNode->next != false) {
            echo $curNode->next->data . '->';
            $curNode = $curNode->next;
        }

        echo 'NULL' . PHP_EOL;

        return true;
    }

    /**
     * 插入链表，使用头插法
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function insert($data)
    {
        return $this->insertDataAfter($this->head, $data);
    }

    /**
     * 在某个节点后面插入新的节点（直接插入数据）
     * @param  SingleLinkedListNode $originNode [description]
     * @param  [type]               $data       [description]
     * @return [type]                           [description]
     */
    public function insertDataAfter(SingleLinkedListNode $originNode, $data)
    {
        if ($originNode == null) {
            return null;
        }

        $newNode = new SingleLinkedListNode($data);

        $newNode->next = $originNode->next;
        $originNode->next = $newNode;

        $this->length ++;

        return $newNode;
    }

    /**
     * 删除链表的某个节点
     * @param  SingleLinkedListNode $node [description]
     * @return [type]                     [description]
     */
    public function delete(SingleLinkedListNode $node)
    {
        if ($node == null) {
            return false;
        }
        // 获取前一个节点
        $preNode = $this->head;
        $curNode = $this->head;

        while ($curNode != $node && $curNode != nul) {
            $preNode = $curNode;
            $curNode = $preNode->next;
        }

        $preNode->next = $node->next;
        unset($node);

        $this->length --;

        return true;
    }

    /**
     * 根据索引获取节点
     * @param  [type] $index [description]
     * @return [type]        [description]
     */
    public function getNodeByIndex($index)
    {
        if ($index >= $this->length) {
            return false;
        }

        $curNode = $this->head->next;
        for ($i = 0; $i < $index; $i++) {
            $curNode = $curNode->next;
        }

        return $curNode;
    }

    /**
     * 反转链表
     * @return [type] [description]
     */
    public function reverse()
    {
        // 前一个一个节点
        $preNode = null;
        // 当前节点
        $curNode = $this->head->next;

        while ($curNode != null) {

            $tmp = $curNode->next;
            $curNode->next = $preNode;

            $preNode = $curNode;
            $curNode = $tmp;                
        }
        
        // 头指针指向反向的列表
        $this->head->next = $curNode;

        return true;
    }

    /**
     * 删除倒数第n个节点
     * @param  [type] $index [description]
     * @return [type]        [description]
     */
    public function deleteLastKth($index)
    {
        // 先倒将链表倒数
        $this->reverse();
        $node = $this->head;
        $preNode = $this->head;
        for ($i = 0; $i < $index; $i ++) {
            $preNode = $node;
            $node = $node->next;
        }

        $preNode->next = $node->next;
        $this->length --;
        unset($node);

        $this->reverse();

        return true;
    }

    /**
     * 判断链表是否有环
     * @return [type] [description]
     */
    public function checkCircle()
    {
        if ($this->head == null || $this->head->next) {
            return false;
        }
        
        $fast = $this->head->next;
        $slow = $this->head->next;

        while ($fast != null && $fast->next != null) {
            $fast = $fast->next->next;
            $slow = $slow->next;
            if ($slow === $fast) {
                return true;
            }
        }
        return false;
    }
}


$list = new SingleLinkedList();
$list->insert(1);
$list->insert(2);
$list->insert(3);
$list->insert(4);
$list->insert(5);
$list->insert(6);
$list->insert(7);
$list->printListSimple();

// 反序
$list->reverse();
$list->printListSimple();

var_dump($list->checkCircle());
