
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Password Generator</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        input[type=number], input[type=submit] { padding: 8px; font-size: 16px; margin-top: 10px; }
        .password { background: #e0ffe0; padding: 15px; font-size: 20px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>

<h2>Random Password Generator</h2>

<form method="post">
    <label for="length">Password Length (e.g. 8, 12, 16):</label><br>
    <input type="number" id="length" name="length" min="4" max="50" required 
           placeholder="Enter number" value="12">
    <br><br>
    <input type="submit" value="Generate Password">
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $length = (int)$_POST['length'];

    if ($length < 4) $length = 4;

    $uppercase   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercase   = 'abcdefghijklmnopqrstuvwxyz';
    $numbers     = '0123456789';
    $special     = '!@#$%^&*()_+-=[]{}|;:,.<>?';

    $allChars = $uppercase . $lowercase . $numbers . $special;
    $shuffled = str_shuffle($allChars);

    $password = substr($shuffled, 0, $length);

    echo "<div class='password'>Your Password: <span style='color:green;'>$password</span></div>";
    echo "<p><small>Tip: Copy it now! Refresh or click again for a new one.</small></p>";
}
?>

</body>
</html>

