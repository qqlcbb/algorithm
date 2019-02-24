<?php

namespace link;

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
