<?php

namespace sort;

/**
 * @title 数组排序函数几何
 */
class SortFunc
{

    /**
     * 冒泡排序
     * @param  [type] $arr [description]
     * @return [type]      [description]
     */
    public function bubble($arr)
    {
        if (empty($arr) || !is_array($arr)) {
            return false;
        }
        $count = count($arr);
        if ($arr == 1) {
            return $arr;
        }
        for ($i = 0; $i < $count; $i ++) {
            $flag = false;
            for ($j = 0; $j < $count - $i - 1; $j ++) {
                if ($arr[$j] > $arr[$j+1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $temp;
                    $flag = true;
                }
            }
            // 如果没有排序过，代表已经按序排列
            if (!$flag) break;
        }

        return $arr;
    }

    /**
     * 插入排序
     * @param  [type] $arr [description]
     * @return [type]      [description]
     */
    public function insertion($arr)
    {
        if (empty($arr) || !is_array($arr)) {
            return false;
        }

        $count = count($arr);
        if ($arr == 1) {
            return $arr;
        }

        for ($i = 1; $i < $count; $i ++) {
            $value = $arr[$i];
            for ($j = $i - 1; $j >= 0; $j--) {
                if ($arr[$j] > $value) {
                    $arr[$j+1] = $arr[$j];
                } else {
                    break;
                }
            }
            $arr[$j + 1] = $value;
        }

        return $arr;
    }

    /**
     * 选择排序
     * @param  [type] $arr [description]
     * @return [type]      [description]
     */
    public function selection($arr)
    {
        if (empty($arr) || !is_array($arr)) {
            return false;
        }
        $count = count($arr);
        if ($arr == 1) {
            return $arr;
        }
        for ($i = 0 ;$i < $count; $i ++) {
            for ($j = $i; $j <= $j - $i - 1; $j ++) {
                $max = $arr[$j];
                if ($arr[$j] < $arr[$j + 1]) {
                    $max = $arr[$j];
                }
            }

            $arr[$i] = $max;
        }

        return $arr;
    }
}