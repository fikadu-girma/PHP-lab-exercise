
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
    <title>Word Counter</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        input[type=text] { width: 100%; padding: 8px; font-size: 16px; }
        input[type=submit] { margin-top: 10px; padding: 8px 16px; }
        pre { background: #f4f4f4; padding: 15px; }
    </style>
</head>
<body>

<h2>Word Counter</h2>

<form method="post">
    <label for="sentence">Enter a sentence:</label><br>
    <input type="text" id="sentence" name="sentence" required
           placeholder="e.g. PHP is great and PHP is fun">
    <br>
    <input type="submit" value="Count Words">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sentence = $_POST['sentence'];

    $sentence = strtolower($sentence);

    $words = explode(' ', $sentence);

    $wordCount = array_count_values($words);

    echo "<h3>Result:</h3>";
    echo "<pre>";
    foreach ($wordCount as $word => $count) {
        echo "$word => $count\n";  
    }
    echo "</pre>";
}
?>

</body>
</html>