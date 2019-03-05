<?php

namespace sort;

/**
 * @title 数组排序函数几何
 */
class SortFunc
{

    /**
     * 冒泡排序
     * 
     * 冒泡排序只会操作相邻的两个数据。每次冒泡操作都会对相邻的两个元素进行比较，看是否满足大小关系要求。
     * 如果不满足就让它俩互换。一次冒泡会让至少一个元素移动到它应该在的位置，重复 n 次，就完成了 n 个数据的排序工作。
     * 
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
     * 
     * 初始已排序区间只有一个元素，就是数组的第一个元素。
     * 插入算法的核心思想是取未排序区间中的元素，在已排序区间中找到合适的插入位置将其插入，并保证已排序区间数据一直有序。
     * 重复这个过程，直到未排序区间中元素为空，算法结束。
     * 
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
            // 取未排序区间的元素
            $value = $arr[$i];
            // 循环已排序区间的元素
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
     *
     * 选择排序算法的实现思路有点类似插入排序，也分已排序区间和未排序区间。
     * 但是选择排序每次会从未排序区间中找到最小的元素，将其放到已排序区间的末尾。
     * 
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
            // 定义最小
            $index = $i;
            $min = $arr[$i];
            // 循环寻找最小的元素
            for ($j = $i; $j < $count; $j ++) {
                if ($arr[$j] < $min) {
                    $min = $arr[$j];
                    $index = $j;
                }
            }  

            // 将最小元素替换到前面
            $temp = $min;
            $arr[$index] = $arr[$i];
            $arr[$i] = $temp;
        }

        return $arr;
    }
}