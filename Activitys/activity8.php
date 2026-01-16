
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Remove Duplicates & Sort</title>
    <style>
        body {font-family: Arial, sans-serif; margin:40px; line-height:1.6;}
        input[type=text], input[type=submit] {padding:8px; font-size:16px; margin:5px 0;}
        .result {background:#f8fff0; padding:15px; margin-top:20px; font-size:18px; border-left:4px solid #28a745;}
        .array {font-family: monospace; font-weight:bold; color:#155724;}
    </style>
</head>
<body>

<h2>Remove Duplicates & Sort Numbers</h2>
<p>Enter numbers separated by commas (e.g. 4, 1, 7, 4, 2, 1)</p>

<form method="post">
    <label for="numbers">Enter numbers:</label><br>
    <input type="text" id="numbers" name="numbers" required
           placeholder="e.g. 4, 1, 7, 4, 2, 1" size="60">
    <br><br>
    <input type="submit" value="Process Array">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input = trim($_POST['numbers']);

    $numberStrings = array_map('trim', explode(',', $input));

    $numbers = [];
    foreach ($numberStrings as $str) {
        if (is_numeric($str)) {
            $numbers[] = (int)$str; 
        }
    }

    $unique = array_unique($numbers);

    sort($unique);

    $count = count($unique);

    echo "<div class='result'>";
    echo "<strong>Original Input:</strong> [" . htmlspecialchars($_POST['numbers']) . "]<br>";
    echo "<strong>Sorted & Unique:</strong> <span class='array'>[" . implode(', ', $unique) . "]</span><br>";
    echo "<strong>Count:</strong> <span style='color:green; font(weight):bold;'>$count</span>";
    echo "</div>";
}
?>

</body>
</html>

