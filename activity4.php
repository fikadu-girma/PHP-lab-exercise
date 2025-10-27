
<!-- ************ NAME AND ID No. ************ 
       NAME: FIKADU GRIMA
       ID No: 1270/16
       COURSE: WEB DEGIGN AND PROGRAMMING-II(SEng3053)
     *****************************************
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find Largest Number</title>
    <style>
        body {font-family: Arial, sans-serif; margin:40px; line-height:1.6;}
        input[type=number], input[type=submit] {padding:8px; font-size:16px; margin:5px;}
        .result {background:#e6f7ff; padding:15px; margin-top:20px; font-size:18px;}
    </style>
</head>
<body>

<h2>Find the Largest of 3 Numbers</h2>

<form method="post">
    <label>Enter first number:</label><br>
    <input type="number" name="num1" required placeholder="e.g. 25"><br>

    <label>Enter second number:</label><br>
    <input type="number" name="num2" required placeholder="e.g. 40"><br>

    <label>Enter third number:</label><br>
    <input type="number" name="num3" required placeholder="e.g. 15"><br><br>

    <input type="submit" value="Find Largest">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $num1 = (int)$_POST['num1'];
    $num2 = (int)$_POST['num2'];
    $num3 = (int)$_POST['num3'];

    $largest = $num1; 

    if ($num2 > $largest) {
        $largest = $num2; 
    }
    if ($num3 > $largest) {
        $largest = $num3;  
    }

    echo "<div class='result'>";
    echo "<strong>Numbers:</strong> $num1, $num2, $num3<br>";
    echo "<strong>Largest:</strong> <span style='color:green;'>$largest</span>";
    echo "</div>";
}
?>

</body>
</html>