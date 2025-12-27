<?php
session_start();

$users = [
    "john" => '$2y$10$JrJw0N3uJv1bS6nS83Vg7e6abCQ3UqQiu3H0QI2f7lQmTpyQq5m3S', // password: 123456
    "mary" => '$2y$10$JYqjS2yJ7G2x6OQk8B1lEeU5Eh4wDP01T6cC6s5OQmV7tJX1x0R2q'  // password: secret
];

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($username === "" || $password === "") {
        $error = "Both fields are required.";
    } elseif (!isset($users[$username])) {
        $error = "Invalid username or password.";
    } elseif (!password_verify($password, $users[$username])) {
        $error = "Invalid username or password.";
    } else {
        $_SESSION["user"] = $username;
        header("Location: dashboard.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if ($error): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post" action="">
    <label>Username:</label><br>
    <input type="text" name="username"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
