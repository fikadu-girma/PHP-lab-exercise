<!DOCTYPE html>
<html>
<body>
<form method="post">
Name: <input type="text" name="username"><br>
<input type="submit">
</form>
<?php
if ($_POST["username"]) {
    echo "<p>Welcome, " . $_POST["username"] . "!</p>";
}
?>
</body>
</html>
