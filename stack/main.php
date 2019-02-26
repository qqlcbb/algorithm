<?php

namespace stack;

require_once '../vendor/autoload.php';

$stack = new StackOnLinkedList();

$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);
$stack->push(5);
$stack->push(6);

$stack->pop();

$stack->print();

