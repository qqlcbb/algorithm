<?php

namespace link;

require_once '../vendor/autoload.php';

/**
 * 合并两个有序列表
 * @param  SingleLinkedList $listA [链表A]
 * @param  SingleLinkedList $listB [链表B]
 * @return [type]                  [description]
 */
function mergeList(SingleLinkedList $listA, SingleLinkedList $listB)
{
    if ($listA == null) {
        return $listA;
    }

    if ($listB == null) {
        return $listB;
    }

    $pListA = $listA->head->next;
    $pListB = $listB->head->next;


    $newList = $list = new SingleLinkedList();
    $newRootNode = $newList->head;

    while ($pListA != null && $pListB != null) {
        if ($pListA->data > $pListB->data) {
            $newRootNode->next = $pListA;
            $pListA = $pListA->next;
        } else {
            $newRootNode->next = $pListB; 
            $pListB = $pListB->next;
        }
        $newRootNode = $newRootNode->next;
    }

    if ($pListA != null) {
        $newRootNode->next = $pListA;
    }

    if ($pListB != null) {
        $newRootNode->next = $pListB;
    }

    return $newList;
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

$listA = new SingleLinkedList();
$listA->insert(1);
$listA->insert(2);
$listA->insert(3);
$listA->insert(4);
$listA->insert(5);
$listA->insert(6);
$listA->insert(7);

$listB = new SingleLinkedList();
$listB->insert(8);
$listB->insert(9);
$listB->insert(10);
$listB->insert(11);
$listB->insert(12);
$listB->insert(13);
$listB->insert(14);
$newList = mergeList($listA, $listB);
$newList->printListSimple();
