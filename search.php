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
            echo 'Your integer has been found on position '.$indexator.' for '.$alltime. ' seconds';
            return $indexator;
        } else {
            echo 'Please enter number from 1 to 900 and array!';
            return 'Please enter number from 1 to 900 and array!';
        }
    }
    straightSearch(899, $rn);
?>