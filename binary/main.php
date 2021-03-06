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

/**
 * 二分法求算术平方根（要求精确到小数点后 6 位）
 * @param  [type] $number [description]
 * @return [type]         [description]
 */
function squareRoot($number)
{
    if ($number < 0) {
        return - 1;
    }
    if ($number < 1) {
        $min = $number;
        $max = 1;
    } else {
        $min = 1;
        $max = $number;
    }
    $mid = $min + ($max - $min) / 2;
    
    while (strlen(explode('.', $mid)[1] ?? 0) < 6) {
        $square = $mid * $mid;
        if ($square == $number) {
            return $mid;
        } elseif ($square > $number) {
            $max = $mid;
        } elseif ($square < $number) {
            $min = $mid;
        }
        $mid = $min + ($max - $min) / 2; 
    }

    return $mid;
}

/**
 * 查找第一个值等于某个值的元素
 * @param  [type] $arr   [description]
 * @param  [type] $value [description]
 * @return [type]      [description]
 */
function bsearch1($arr, $value)
{
    $count = count($arr);
    $start = 0;
    $end = $count - 1;

    while ($start <= $end) {
        $mid = $start + $end - $start;
        if ($arr[$mid] > $value) {
            $end = $mid - 1;
        } elseif ($arr[$mid] < $value) {
            $start = $mid + 1;
        } else {
            if ($mid == 0 || $arr[$mid - 1] != $value) return $mid;
            else $end = $mid - 1;
        }
    }
    return -1;
}

/**
 * 查找最后一个值等于某个值的元素
 * @param  [type] $arr   [description]
 * @param  [type] $value [description]
 * @return [type]        [description]
 */
function bsearch2($arr, $value)
{
    $count = count($arr);
    $start = 0;
    $end = $count - 1;

    while ($start <= $end) {
        $mid = $start + $end - $start;
        if ($arr[$mid] > $value) {
            $end = $mid - 1;
        } elseif ($arr[$mid] < $value) {
            $start = $mid + 1;
        } else {
            if ($mid == 0 || $arr[$mid + 1] != $value) return $mid;
            else $start = $mid + 1;
        }
    }

    return -1;
}

/**
 * 查找第一个大于等于给定值的元素
 * @param  [type] $arr   [description]
 * @param  [type] $value [description]
 * @return [type]        [description]
 */
function bsearch3($arr, $value)
{
    $count = count($arr);
    $start = 0;
    $end = $count - 1;

    while ($start <= $end) {
        $mid = $start + $end - $start;
        if ($arr[$mid] >= $value) {
            if ($mid == 0 || $arr[$mid - 1] < $value) return $mid;
            else $end = $mid - 1;
        } else {
            $start = $mid + 1;
        }
    }
    return -1;    
}

/**
 * 查找最后一个小于等于给定值的元素
 * @param  [type] $arr   [description]
 * @param  [type] $value [description]
 * @return [type]        [description]
 */
function bsearch4($arr, $value)
{
    $count = count($arr);
    $start = 0;
    $end = $count - 1;

    while ($start <= $end) {
        $mid = $start + $end - $start;
        if ($arr[$mid] <= $value) {
            if ($mid == 0 || $arr[$mid + 1] > $value) return $mid;
            else $start = $mid + 1;
        } else {
            $end = $mid - 1;
        }
    }

    return - 1;
}

$arr = [1, 2, 3, 5, 5, 7, 8];
var_dump(bsearch4($arr, 5));
