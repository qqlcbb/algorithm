<?php

namespace sort;

require_once '../vendor/autoload.php';

$arr = [1,5,3,23,5,56,323];
$sortFunc = new SortFunc();

$arr1 = $sortFunc->bubble($arr);
print_r($arr1);

$arr2 = $sortFunc->insertion($arr);
print_r($arr2);

$arr3 = $sortFunc->selection($arr);
print_r($arr3);