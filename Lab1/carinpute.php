<?php
// Start a session so the array can persist between submissions
session_start();

// Initialize the cars array if it doesn't exist yet
if (!isset($_SESSION['cars'])) {
    $_SESSION['cars'] = [];
}

// When the form is submitted, add the car name to the array
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $carName = trim($_POST['car_name']);

    if ($carName !== "") {
        $_SESSION['cars'][] = $carName;
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form method="post">
    <label>Enter car name:</label>
    <input type="text" name="car_name" required>
    <button type="submit">Add</button>
</form>

<h3>Stored Cars:</h3>
<ul>
    <?php foreach ($_SESSION['cars'] as $car): ?>
        <li><?php echo htmlspecialchars($car); ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>
