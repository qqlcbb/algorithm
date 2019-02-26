<?php

namespace stack;

use link\SingleLinkedListNode;

/**
 * @title 链式栈
 */
class StackOnLinkedList
{
    /**
     * 头指针
     * @var [type]
     */
    public $head;

    /**
     * 链表长度
     * @var integer
     */
    public $length;

    /**
     * [__construct description]
     * @param SingleLinkedListNode|null $head [description]
     */
    public function __construct(SingleLinkedListNode $head = null)
    {
        if ($head == null) {
            $this->head = new SingleLinkedListNode;
        } else {
            $this->head = $head;
        }
        $this->length = 0;
    }

    /**
     * 出栈
     * @return [type] [description]
     */
    public function pop()
    {
        $node = $this->head->next;
        if ($node == null) {
            return false;
        }
        $this->head->next = $this->head->next->next;
        $this->length --;

        return $node;
    }

    /**
     * 入栈
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function push($data)
    {
        $node = new SingleLinkedListNode($data);

        $node->next = $this->head->next;
        $this->head->next = $node;

        $this->length ++;

        return true;
    }

    /**
     * 获取栈顶元素
     * @return [type] [description]
     */
    public function top()
    {
        if ($this->length == 0) {
            return false;
        }
        return $this->head->next;
    }

    /**
     * 打印栈
     * @return [type] [description]
     */
    public function print()
    {
        if ($this->head->next == null) {
            return false;
        }

        $node = $this->head->next;
        while ($node != null) {
            echo $node->data . '->';
            $node = $node->next;
        }
        echo 'NULL' . PHP_EOL;

        return true;
    }
}