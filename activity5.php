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
    <title>Sum of Array Elements</title>
    <style>
        body {font-family: Arial, sans-serif; margin:40px; line-height:1.6;}
        input[type=text], input[type=submit] {padding:8px; font-size:16px; margin:5px 0;}
        .result {background:#f0fff0; padding:15px; margin-top:20px; font-size:18px;}
        .code {background:#f4f4f4; padding:10px; font-family: monospace; margin:10px 0;}
    </style>
</head>
<body>

<h2>Sum of Array Elements</h2>
<p>Enter numbers separated by commas (e.g. 5, 10, 15)</p>

<form method="post">
    <label for="numbers">Enter numbers:</label><br>
    <input type="text" id="numbers" name="numbers" required
           placeholder="e.g. 10, 20, 30, 5" size="50">
    <br><br>
    <input type="submit" value="Calculate Sum">
</form>

<?php
function sumArray($arr) {
    $total = 0;
    foreach ($arr as $num) {
        $total += $num;  
    }
    return $total;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = trim($_POST['numbers']);

    $numberStrings = explode(',', $input);
    $numbers = [];

    foreach ($numberStrings as $str) {
        $num = trim($str);           
        if (is_numeric($num)) {
            $numbers[] = (int)$num; 
        }
    }

    $sum = sumArray($numbers);

    echo "<div class='result'>";
    echo "<strong>Array:</strong> [" . implode(', ', $numbers) . "]<br>";
    echo "<strong>Sum:</strong> <span style='color:green;'>$sum</span>";
    echo "</div>";

    echo "<div class='code'>";
    echo "<small><b>Sample call:</b> sumArray([5, 10, 15]) → " . sumArray([5, 10, 15]) . "</small>";
    echo "</div>";
}
?>

</body>
</html>

