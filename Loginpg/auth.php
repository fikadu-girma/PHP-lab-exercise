<?php
session_start();

// Simple in-memory users array (replace with DB in real apps)
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"];
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($action === "signup") {
        if (empty($username) || empty($password)) {
            $message = "All fields are required.";
        } elseif (isset($_SESSION['users'][$username])) {
            $message = "Username already exists.";
        } else {
            $_SESSION['users'][$username] = password_hash($password, PASSWORD_BCRYPT);
            $message = "Signup successful! You can now login.";
        }
    }

    if ($action === "login") {
        if (!isset($_SESSION['users'][$username]) ||
            !password_verify($password, $_SESSION['users'][$username])) {
            $message = "Invalid username or password.";
        } else {
            $_SESSION["user"] = $username;
            header("Location: dashboard.php");
            exit;
        }
    }
}
?>
