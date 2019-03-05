<?php

/**
 * 最简单的二分法算法
 * @param  [type] $arr   [有序一维护数组]
 * @param  [type] $value [查找值]
 * @return [type]        [返回数组下标]
 */
function bsearch($arr, $value)
{
    if (empty($arr) || !is_array($arr)) {
        return false;
    }
    $start = 0;
    $end = count($arr) - 1;

    while ($start <= $end) {
        // 取整
        $mid = intval(($start + $end) / 2);
        if ($arr[$mid] == $value) {
            return $mid;
        }
        elseif ($arr[$mid] < $value) {
            $start = $mid + 1;
        } elseif ($arr[$mid] > $value) {
            $end = $mid - 1;
        }
    }

    return - 1;
}

/**
 * 最简单的二分法算法(递归)
 * @param  [type] $arr   [数组]
 * @param  [type] $start [开始下标]
 * @param  [type] $end   [结束下标]
 * @param  [type] $value [查找的值]
 * @return [type]        [description]
 */
function search($arr, $start, $end, $value)
{
    if ($start > $end) {
        return -1;
    }

    $mid = intval(($start + $end) / 2);

    if ($arr[$mid] == $value) {
        return $mid;
    } elseif ($arr[$mid] < $value) {
        return search($arr, $mid + 1, $end, $value);
    } elseif ($arr[$mid] > $value) {
        return search($arr, $start, $end - 1, $value);
    }

    return - 1;
}

$arr = [1,3,5,7,9];
var_dump(bsearch($arr, 3));

var_dump(search($arr, 0, count($arr) - 1, 3));
