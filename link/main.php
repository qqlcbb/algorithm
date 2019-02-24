<?php

namespace link;

require_once '../vendor/autoload.php';

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

