
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Number: Positive, Negative, or Zero</title>
    <style>
        body {font-family: Arial, sans-serif; margin:40px; line-height:1.6;}
        input[type=number], input[type=submit] {padding:8px; font-size:16px; margin:5px 0;}
        .result {background:#f9f9f9; padding:15px; margin-top:20px; font-size:18px; border-left:4px solid #007cba;}
        .positive {color:green; font-weight:bold;}
        .negative {color:red; font-weight:bold;}
        .zero     {color:blue; font-weight:bold;}
    </style>
</head>
<body>

<h2>Check if Number is Positive, Negative, or Zero</h2>

<form method="post">
    <label for="number">Enter a number:</label><br>
    <input type="number" id="number" name="number" required placeholder="e.g. 25 or -10" step="any">
    <br><br>
    <input type="submit" value="Check Number">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = $_POST['number'];
    $number = (float)$number;

    echo "<div class='result'>";
    echo "<strong>Result: </strong> $number → ";

    if ($number > 0) {
        echo "<span class='positive'>Positive</span>";
    }
    elseif ($number < 0) {
        echo "<span class='negative'>Negative</span>";
    }
    else {
        echo "<span class='zero'>Zero</span>";
    }

    echo "</div>";
}
?>

</body>
</html>