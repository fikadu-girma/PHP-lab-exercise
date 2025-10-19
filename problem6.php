<?php
$array1 = [3, 1, 2];
$array2 = [6, 5, 4];
$merged = array_merge($array1, $array2);
sort($merged);
print_r($merged);
?>