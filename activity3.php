
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
    <title>Email Masker</title>
    <style>
        body {font-family: Arial, sans-serif; margin:40px; line-height:1.6;}
        input[type=text], input[type=submit] {padding:8px; font-size:16px; margin:5px 0;}
        .result   {background:#f0f8ff; padding:15px; margin-top:20px; font-size:18px;}
        .error    {color:red;}
    </style>
</head>
<body>

<h2>Email Masker</h2>

<form method="post">
    <label for="email">Enter an e‑mail address:</label><br>
    <input type="text" id="email" name="email" required
           placeholder="e.g. student@example.com" size="45">
    <br><br>
    <input type="submit" value="Mask Email">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);

    function maskEmail(string $email): string {
        $atPos = strpos($email, '@');

        if ($atPos === false) {
            return $email;
        }

        $username = substr($email, 0, $atPos);         
        $domain   = substr($email, $atPos);          

        if (strlen($username) <= 3) {
            $maskedUser = $username;                  
        } else {
            $visible = substr($username, 0, 3);         
            $maskedUser = $visible . '***';
        }

        return $maskedUser . $domain;
    }

    $masked = maskEmail($email);

    echo '<div class="result">';
    echo '<strong>Original:</strong> ' . htmlspecialchars($email) . '<br>';
    echo '<strong>Masked:  </strong> <span style="color:green;">' .
         htmlspecialchars($masked) . '</span>';
    echo '</div>';
}
?>

</body>
</html>

