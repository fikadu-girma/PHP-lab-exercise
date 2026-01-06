<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST["weight"];
    $height = $_POST["height"];

    if ($weight > 0 && $height > 0) {
        $bmi = $weight / ($height * $height);
        $bmi = round($bmi, 2);

        if ($bmi < 18.5) {
            $status = "Underweight";
        } elseif ($bmi < 24.9) {
            $status = "Normal weight";
        } elseif ($bmi < 29.9) {
            $status = "Overweight";
        } else {
            $status = "Obese";
        }

        $result = "Your BMI is $bmi — $status";
    } else {
        $result = "Please enter valid values.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; padding:30px; }
        .box { width:400px; margin:auto; background:#fff; padding:20px; border-radius:10px; }
        input, button { width:100%; padding:10px; margin-top:10px; }
        .result { margin-top:15px; font-weight:bold; }
    </style>
</head>
<body>

<div class="box">
    <h2>⚖️ BMI Calculator</h2>

    <form method="post">
        <input type="number" step="0.1" name="weight" placeholder="Weight in kg" required>
        <input type="number" step="0.01" name="height" placeholder="Height in meters" required>
        <button type="submit">Calculate BMI</button>
    </form>

    <div class="result">
        <?php echo $result; ?>
    </div>
</div>

</body>
</html>
