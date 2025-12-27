<?php
$name = $email = "";
$nameErr = $emailErr = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if ($nameErr == "" && $emailErr == "") {
        $successMsg = "Form submitted successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>PHP Form Validation Example</h2>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red;"><?php echo $nameErr; ?></span>
    <br><br>

    Email: <input type="text" name="email" value="<?php echo $email; ?>">
    <span style="color:red;"><?php echo $emailErr; ?></span>
    <br><br>

    <input type="submit" value="Submit">
</form>

<p style="color:green;"><?php echo $successMsg; ?></p>

</body>
</html>
