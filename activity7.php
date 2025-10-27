
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
    <title>Vowel & Consonant Counter</title>
    <style>
        body {font-family: Arial, sans-serif; margin:40px; line-height:1.6;}
        input[type=text], input[type=submit] {padding:8px; font-size:16px; margin:5px 0;}
        .result {background:#f0f8ff; padding:15px; margin-top:20px; font-size:18px; border-left:4px solid #007cba;}
        .vowel {color: #d63384; font-weight:bold;}
        .consonant {color: #0d6efd; font-weight:bold;}
    </style>
</head>
<body>

<h2>Count Vowels and Consonants</h2>
<p>Enter any sentence. Only letters are counted.</p>

<form method="post">
    <label for="sentence">Enter a sentence:</label><br>
    <input type="text" id="sentence" name="sentence" required
           placeholder="e.g. Programming is fun" size="50">
    <br><br>
    <input type="submit" value="Count Letters">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sentence = trim($_POST['sentence']);

    $sentence = strtolower($sentence);

    $vowels = ['a', 'e', 'i', 'o', 'u'];

    $vowelCount = 0;
    $consonantCount = 0;

    for ($i = 0; $i < strlen($sentence); $i++) {
        $char = $sentence[$i]; 

        if (ctype_alpha($char)) {
            if (in_array($char, $vowels)) {
                $vowelCount++;
            } else {
                $consonantCount++;
            }
        }
    }

    echo "<div class='result'>";
    echo "<strong>Input:</strong> " . htmlspecialchars($_POST['sentence']) . "<br>";
    echo "<strong>Vowels:</strong> <span class='vowel'>$vowelCount</span>, ";
    echo "<strong>Consonants:</strong> <span class='consonant'>$consonantCount</span>";
    echo "</div>";
}
?>

</body>
</html>

