<?php

    $rn = range(1, 900);
/**
 * Straight search through array
 *
 * @param $num
 * @param $numarray
 * @return int|mixed|string
 */
    function straightSearch($num, $numarray) {
        if((is_array($numarray))&&(is_numeric($num))&&($num > 0)&&($num <= max($numarray))) {
            $indexator = 0;
            foreach ($numarray as $integer) {
                if($num === $integer) {
                    $indexator = array_search($integer, $numarray);
                    break;
                }
            }
            return $indexator;
        } else {
            echo 'Please enter number from 1 to 900 and array!';
            return 'Please enter number from 1 to 900 and array!';
        }
    }

/**
 * Binary search through sorted array
 * @param array $source_array Sorted integers array
 * @param int $search_value Integer to find
 * @return bool|int
 */
function binarySearch($search_value, &$source_array)
{
    $count = count($source_array); // считаем количество элементов в массиве
    if ($count < pow(2, 31) && is_int($search_value)) {
        $start = 0; // индекс первого элемента массива
        $end = $count - 1; // индекс последнего элемента массива
        while (true) {
            $len = $end - $start; // длина массива
            if ($len > 2) {
                if ($len % 2 != 0) $len++;
                $mid = (int)($len / 2 + $start);
            } elseif ($len >= 0) {
                $mid = $start;
            } else {
                return false;
            }
            if ($source_array[$mid] == $search_value) {
                while (($mid != 0) && ($source_array[$mid - 1] == $search_value))
                    $mid--;
                return $mid;
            } elseif ($source_array[$mid] > $search_value) {
                $end = $mid - 1;
            } else {
                $start = $mid + 1;
            }
        }
    } else {
        return false;
    }
}

// Loops for testing speed of straight and binary search
$wholetime1 = 0;
for($i=0; $i<=100000; $i++) {
    $start_time1 = microtime(true);
    straightSearch(899, $rn);
    $alltime1 = microtime(true) - $start_time1;
    $wholetime1 = $wholetime1 + $alltime1;
}
$wholetime2 = 0;
for($j=0; $j<=100000; $j++) {
    $start_time2 = microtime(true);
    binarySearch(899, $rn);
    $alltime2 = microtime(true) - $start_time2;
    $wholetime2 = $wholetime2 + $alltime2;
}
echo 'The Straight Search has been finished in '.$wholetime1.' seconds'."\r\n";
echo 'The Binary Search has been finished in '.$wholetime2.' seconds'."\r\n";
?>