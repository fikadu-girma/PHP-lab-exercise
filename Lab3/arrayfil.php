<?php
$array = [1, 2, 3, 4, 5];
$result = array_filter($array, function ($value) {
	return $value % 2 === 0;
});
print_r($result);
?>