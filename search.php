<?php
    $rn = range(1, 900);
    shuffle($rn);

/**
 * Straight search through array
 *
 * @param $num
 * @param $numarray
 * @return int|mixed|string
 */
    function straightSearch($num, $numarray) {
        $start = $_SERVER['REQUEST_TIME'];
        if((is_array($numarray))&&(is_numeric($num))&&($num > 0)&&($num < 901)) {
            foreach ($numarray as $integer) {
                $indexator = 0;
                if($num === $integer) {
                    $indexator = array_search($integer, $numarray);
                    break;
                }
            }
            $alltime = microtime(true) - $start;
            echo 'Your integer has been found by Straight search on position '.$indexator.' for '.$alltime. ' seconds';
            return $indexator;
        } else {
            echo 'Please enter number from 1 to 900 and array!';
            return 'Please enter number from 1 to 900 and array!';
        }
    }

/**
 * Функция бинарного поиска по упорядоченному массиву
 * @param array $source_array Упорядоченный по возрастанию массив целых чисел
 * @param int $search_value Искомая величина
 * @return bool|int
 */
function binarySearch(&$source_array, $search_value)
{
    $start_time = $_SERVER['REQUEST_TIME'];
    sort($source_array);
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
                $alltime = microtime(true) - $start_time;
                echo 'Binary search had found your integer on position ' .$mid. ' in '.$alltime.' seconds';
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

straightSearch(899, $rn);
binarySearch($rn, 345);
?>