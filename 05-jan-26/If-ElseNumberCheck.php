<!DOCTYPE html>
<html>
<body>
<form method="post">
Number: <input type="number" name="num"><br>
<input type="submit">
</form>
<?php
if ($_POST["num"]) {
    $n = $_POST["num"];
    if ($n > 10) echo "<p>$n is greater than 10.</p>";
    elseif ($n > 0) echo "<p>$n is positive but <=10.</p>";
    else echo "<p>$n is non-positive.</p>";
}
?>
</body>
</html>
