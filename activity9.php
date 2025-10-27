
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
    <title>Find Max & Min (No max/min)</title>
    <style>
        body {font-family: Arial, sans-serif; margin:40px; line-height:1.6;}
        input[type=text], input[type=submit] {padding:8px; font-size:16px; margin:5px 0;}
        .result {background:#fff3cd; padding:15px; margin-top:20px; font-size:18px; border-left:4px solid #ffc107;}
        .max {color:#d63384; font-weight:bold;}
        .min {color:#0d6efd; font-weight:bold;}
    </style>
</head>
<body>

<h2>Find Maximum and Minimum (Using Loops)</h2>
<p>Enter numbers separated by commas (e.g. 10, 5, 25, 7, 15)</p>

<form method="post">
    <label for="numbers">Enter numbers:</label><br>
    <input type="text" id="numbers" name="numbers" required
           placeholder="e.g. 10, 5, 25, 7, 15" size="60">
    <br><br>
    <input type="submit" value="Find Max & Min">
</form>

<?php

function findMaxMin($arr) {
    if (empty($arr)) {
        return ['max' => null, 'min' => null];
    }

    $max = $arr[0];
    $min = $arr[0];

    foreach ($arr as $num) {
        if ($num > $max) {
            $max = $num;  
        }
        if ($num < $min) {
            $min = $num;  
        }
    }

    return ['max' => $max, 'min' => $min];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input = trim($_POST['numbers']);
    $numberStrings = array_map('trim', explode(',', $input));

    $numbers = [];
    foreach ($numberStrings as $str) {
        if (is_numeric($str)) {
            $numbers[] = (float)$str; 
        }
    }

    if (empty($numbers)) {
        echo "<div class='result'>Please enter valid numbers.</div>";
    } else {
        $result = findMaxMin($numbers);

        echo "<div class='result'>";
        echo "<strong>Input Array:</strong> [" . implode(', ', $numbers) . "]<br>";
        echo "<strong>Max:</strong> <span class='max'>{$result['max']}</span>, ";
        echo "<strong>Min:</strong> <span class='min'>{$result['min']}</span>";
        echo "</div>";
    }
}
?>

</body>
</html>


