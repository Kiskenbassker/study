<?php

$bubbleArray = range(1, 1200);
shuffle($bubbleArray);

$count = count($bubbleArray);
$end = $count - 1;

for($j = 0; $j <= $end; $j++) {
    for ($i = 0; $i <= $end; $i++) {
        if (($bubbleArray[$j] < $bubbleArray[$i])&&(is_numeric($bubbleArray[$j]))&&(is_numeric($bubbleArray[$i]))) {
            $tempBubble = $bubbleArray[$i];
            $bubbleArray[$i] = $bubbleArray[$j];
            $bubbleArray[$j] = $tempBubble;
        }
    }
}
?>