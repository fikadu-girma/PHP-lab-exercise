
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Character Frequency Counter</title>
    <style>
        body {font-family: Arial, sans-serif; margin:40px; line-height:1.6;}
        input[type=text], input[type=submit] {padding:8px; font-size:16px; margin:5px 0;}
        .result {background:#f0f8ff; padding:15px; margin-top:20px; font-size:18px; border-left:4px solid #007cba;}
        .char {font-family: monospace; font-weight:bold; color:#d63384;}
        pre {background:#f4f4f4; padding:10px; margin:10px 0; font-family: monospace;}
    </style>
</head>
<body>

<h2>Character Frequency Counter</h2>
<p>Enter any string. Spaces will be ignored.</p>

<form method="post">
    <label for="text">Enter text:</label><br>
    <input type="text" id="text" name="text" required
           placeholder="e.g. hello world" size="50">
    <br><br>
    <input type="submit" value="Count Characters">
</form>

<?php
function countCharacters($str) {
    $str = str_replace(' ', '', $str);
    $chars = str_split($str);
    $count = [];

    foreach ($chars as $char) {
        if (isset($count[$char])) {
            $count[$char]++;
        } else {
            $count[$char] = 1; 
        }
    }

    return $count;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input = $_POST['text'];

    $frequency = countCharacters($input);

    echo "<div class='result'>";
    echo "<strong>Input:</strong> " . htmlspecialchars($input) . "<br>";
    echo "<strong>Output:</strong><br>";
    echo "<pre>";
    foreach ($frequency as $char => $num) {
        echo "$char → $num\n"; 
    }
    echo "</pre>";
    echo "</div>";
}
?>

</body>
</html>