<?php 
$cars = ["Volvo", "BMW", "Toyota"];
array_push($cars, "Honda", "Mercedes");
array_pop($cars);

print_r($cars);

$array_count = count($cars);

for($i = 0; $i < $array_count; $i++){
    echo $cars[$i] . "<br>";
}
?>