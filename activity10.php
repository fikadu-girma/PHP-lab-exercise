
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
    <title>Strong Password Checker</title>
    <style>
        body {font-family: Arial, sans-serif; margin:40px; line-height:1.6;}
        input[type=password], input[type=submit] {padding:8px; font-size:16px; margin:5px 0;}
        .result {padding:15px; margin-top:20px; font-size:18px; border-radius:5px;}
        .strong {background:#d4edda; border-left:4px solid #28a745; color:#155724;}
        .weak   {background:#f8d7da; border-left:4px solid #dc3545; color:#721c24;}
        .criteria {font-size:14px; margin-top:10px; color:#555;}
    </style>
</head>
<body>

<h2>Strong Password Checker</h2>
<p>A strong password must:</p>
<ul>
    <li>Be at least 8 characters long</li>
    <li>Contain both letters and numbers</li>
</ul>

<form method="post">
    <label for="password">Enter password:</label><br>
    <input type="password" id="password" name="password" required
           placeholder="e.g. Pass1234" size="40">
    <br><br>
    <input type="submit" value="Check Password">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password = $_POST['password'];

    $isLongEnough = false;
    $hasLetters   = false;
    $hasNumbers   = false;

    if (strlen($password) >= 8) {
        $isLongEnough = true;
    }

    if (preg_match('/[a-zA-Z]/', $password)) {
        $hasLetters = true;
    }

    if (preg_match('/[0-9]/', $password)) {
        $hasNumbers = true;
    }

    if ($isLongEnough && $hasLetters && $hasNumbers) {
        $status = "strong";
        $message = "Strong Password";
    } else {
        $status = "weak";
        $message = "Weak Password";
    }

    echo "<div class='result $status'>";
    echo "<strong>Result:</strong> <span style='font-weight:bold;'>$message</span><br>";

    echo "<div class='criteria'>";
    echo $isLongEnough ? "8+ characters" : "Less than 8 characters";
    echo "<br>";
    echo $hasLetters ? "Has letters" : "No letters";
    echo "<br>";
    echo $hasNumbers ? "Has numbers" : "No numbers";
    echo "</div>";
    echo "</div>";
}
?>

</body>
</html>