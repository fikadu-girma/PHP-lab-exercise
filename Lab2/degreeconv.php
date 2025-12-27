<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = floatval($_POST["degree"]);
    $type = $_POST["type"];

    if ($type == "c_to_f") {
        $converted = ($value * 9/5) + 32;
        $result = "$value °C = " . round($converted, 2) . " °F";
    } elseif ($type == "f_to_c") {
        $converted = ($value - 32) * 5/9;
        $result = "$value °F = " . round($converted, 2) . " °C";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Degree Converter</title>
</head>
<body>

<h2>Degree Converter</h2>

<form method="post">
    <input type="number" step="any" name="degree" required placeholder="Enter value">

    <select name="type">
        <option value="c_to_f">Celsius ➝ Fahrenheit</option>
        <option value="f_to_c">Fahrenheit ➝ Celsius</option>
    </select>

    <button type="submit">Convert</button>
</form>

<h3>
    <?php echo $result; ?>
</h3>

</body>
</html>
