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
}