<?php
$string = "apple,banana,cherry";
$array = explode(",", $string);

$newString = implode(",", $array);

echo "\n";
print_r($array);
echo $newString;
