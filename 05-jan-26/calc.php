<!DOCTYPE html>
<html>
<body>
<form method="post">
Num1: <input type="number" name="n1"><br>
Num2: <input type="number" name="n2"><br>
<input type="submit" value="Add">
</form>
<?php
if ($_POST["n1"] && $_POST["n2"]) {
    echo "Sum: " . ($_POST["n1"] + $_POST["n2"]);
}
?>
</body>
</html>
