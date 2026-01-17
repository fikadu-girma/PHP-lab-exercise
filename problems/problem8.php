<?php
$array1 = [1, 2, 3];
$array2 = [3, 4, 5];
$merged = array_merge($array1, $array2);
$result = array_unique($merged);
$result = array_values($result);
print_r($result);
?>