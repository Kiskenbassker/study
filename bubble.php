<?php
ini_set('max_execution_time', 900);
$bubbleArray = range(0, 900);
shuffle($bubbleArray);
print_r($bubbleArray);
$count = count($bubbleArray);
$end = $count - 1;

for ($j = 0; $j <= $end; $j++) {
    for ($i = 0; $i <= $end; $i++) {
        $current = $bubbleArray[$j];
        if ($current < $bubbleArray[$i]) {
            $tempBubble = $bubbleArray[$i];
            $bubbleArray[$i] = $bubbleArray[$j];
            $bubbleArray[$j] = $tempBubble;
        }
    }
}
print_r($bubbleArray);
?>