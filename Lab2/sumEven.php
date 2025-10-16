<?php
    $sum = 0;
    for ($i = 2; $i <= 100; $i +=2) {
        $sum += $i;
    }
    echo "the sum of even numbers between 1-100 is(including 100): " . $sum;
?>