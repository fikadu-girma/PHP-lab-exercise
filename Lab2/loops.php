<?php
echo "for loop<br>";
    for ($num = 1; $num <= 10; $num++){
        echo $num . "<br>";
    }
echo "while loop<br>";
    $count = 10;
    while($count > 0){
        echo $count . "<br> ";
        $count--;
    }
echo "foreach loop<br>";
    $Students = ["Abebe", "Kebede", "firaol", "firanboon"];
    foreach($Students as $student){
        echo $student . "<br> ";
    }
?>