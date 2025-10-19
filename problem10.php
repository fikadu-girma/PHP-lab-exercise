<?php
$array1 = [1, 2, 3, 4];
$array2 = [3, 4, 5, 6];
$result = array_intersect($array1, $array2);
$result = array_values($result);
print_r($result);
?>