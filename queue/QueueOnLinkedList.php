<?php

namespace queue;

use link\SingleLinkedListNode;

/**
 * @title 链表队列
 */
class QueueOnLinkedList
{
    /**
     * 头节点
     * @var [type]
     */
    public $head;

    /**
     * 尾节点
     * @var [type]
     */
    public $tail;

    /**
     * 长度
     * @var [type]
     */
    public $length;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->head = new SingleLinkedListNode();
        $this->tail = $this->head;

        $this->length = 0;
    }

    /**
     * 入栈
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function enqueue($data)
    {
        $newNode = new SingleLinkedListNode();
        $newNode->data = $data;

        $this->tail->next = $newNode;
        $this->tail = $newNode;

        $this->length ++;
    }

    /**
     * 出栈
     * @return [type] [description]
     */
    public function dequeue()
    {
        if ($this->length == 0) {
            return false;
        }

        $node = $this->head->next;

        $this->head->next = $this->head->next->next;
        $this->length --;

        return $node;
    }

    /**
     * 打印队列
     * @return [type] [description]
     */
    public function printQueue()
    {
        $node = $this->head->next;
        while ($node != null) {
            echo $node->data . '->';
            $node = $node->next;
        }
        echo 'NULL' . PHP_EOL;
    } 
}