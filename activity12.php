
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
    <title>Filter Numbers Above Average</title>
    <style>
        body {font-family: Arial, sans-serif; margin:40px; line-height:1.6;}
        input[type=text], input[type=submit] {padding:8px; font-size:16px; margin:5px 0;}
        .result {background:#e6f7ff; padding:15px; margin-top:20px; font-size:18px; border-left:4px solid #007cba;}
        .highlight {color:#d63384; font-weight:bold;}
        pre {background:#f4f4f4; padding:10px; margin:5px 0; font-family: monospace;}
    </style>
</head>
<body>

<h2>Filter Numbers Above Average</h2>
<p>Enter numbers separated by commas (e.g. 10, 20, 30, 40, 50)</p>

<form method="post">
    <label for="numbers">Enter numbers:</label><br>
    <input type="text" id="numbers" name="numbers" required
           placeholder="e.g. 10, 20, 30, 40, 50" size="60">
    <br><br>
    <input type="submit" value="Filter Above Average">
</form>

<?php
function filterAboveAverage($arr) {
    $sum = 0;
    $count = 0;

    foreach ($arr as $num) {
        $sum += $num;
        $count++;
    }

    if ($count == 0) {
        return [];
    }

    $average = $sum / $count;

    $aboveAverage = [];
    foreach ($arr as $num) {
        if ($num > $average) {
            $aboveAverage[] = $num;
        }
    }

    return [
        'average' => $average,
        'result'  => $aboveAverage
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input = trim($_POST['numbers']);
    $strArray = array_map('trim', explode(',', $input));

    $numbers = [];
    foreach ($strArray as $str) {
        if (is_numeric($str)) {
            $numbers[] = (float)$str;
        }
    }

    if (empty($numbers)) {
        echo "<div class='result'>Please enter valid numbers.</div>";
    } else {
        $output = filterAboveAverage($numbers);

        $avg = $output['average'];
        $result = $output['result'];

        echo "<div class='result'>";
        echo "<strong>Input:</strong> [" . implode(', ', $numbers) . "]<br>";
        echo "<strong>Average =</strong> <span class='highlight'>$avg</span><br>";
        echo "<strong>Numbers above average:</strong><br>";
        if (empty($result)) {
            echo "<pre>No numbers above average.</pre>";
        } else {
            echo "<pre>[" . implode(', ', $result) . "]</pre>";
        }
        echo "</div>";
    }
}
?>

</body>
</html>