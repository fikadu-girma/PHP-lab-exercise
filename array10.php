<?php
$array = [1, 2, 3, 4];
$result = array_map(function ($value) {
	return $value * $value; // Square each number
}, $array);
print_r($result);
