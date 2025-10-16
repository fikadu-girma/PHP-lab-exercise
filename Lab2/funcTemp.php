<?php
$celsius = 0;
$msg = "";
if (isset($_POST['degree'])) {
    $celsius = $_POST['celsius'];
}



function celsiusToFahrenheit($c)
{
    if ($c < -273.15) {
        return $msg =  "Invalid temperature.";
    }

    $fahrenheit = ($c * 9 / 5) + 32;
    return  $msg = "$c Degree in Celsius equal with  $fahrenheit degree in Fahrenheit";
}

$score = 0;
if (isset($_POST['grade'])) {
    $score = $_POST['score'];
}
function evaluateGrade($score)
{
    if ($score < 0 || $score > 100) {
        return "Invalid score.";
    } elseif ($score >= 90) {
        return "Grade: A+";
    } elseif ($score >= 80 && $score < 90) {
        return "Grade: A";
    } elseif ($score >= 80 && $score < 85) {
        return "Grade: A-";
    } elseif ($score >= 75 && $score < 80) {
        return "Grade: B+";
    } elseif ($score >= 70 && $score < 75) {
        return "Grade: B";
    } elseif ($score >= 65 && $score < 70) {
        return "Grade: B-";
    } elseif ($score >= 60 && $score < 65) {
        return "Grade: C+";
    } elseif ($score >= 50 && $score < 60) {
        return "Grade: C";
    } else {
        return "Grade: F";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 6 | Function</title>
</head>

<body>
    <h2>Problem 1</h2>


    <form action="" method="POST">
        <label for="celcious">Celsius</label>
        <br><br>
        <input required type="text" name="celsius" value="<?= (isset($celsius)) ? $celsius : " " ?>">
        <button type="submit" name="degree">Submit</button>
    </form>

    <h1><?php echo celsiusToFahrenheit($celsius); ?></h1>

    <h2>Problem 2</h2>

    <form action="" method="post">
        <label for="score">Score</label>
        <br><br>
        <input required type="text" name="score" value="<?= (isset($score)) ? $score : " " ?>">
        <button type="submit" name="grade">Submit</button>
    </form>
    <h1><?= "Score $score: " . evaluateGrade($score) . "<br>"; ?></h1>
</body>

</html>