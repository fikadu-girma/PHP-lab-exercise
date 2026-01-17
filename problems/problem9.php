<?php
$array = ["name" => "Aliyu", "city" => "Addis"];
$result = array_change_key_case($array, CASE_UPPER);
print_r($result);
?>