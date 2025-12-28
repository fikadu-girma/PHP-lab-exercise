<?php
$file = "feedback.txt";
$message = "";
$feedbackList = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $feedback = trim($_POST["feedback"] ?? "");

    if ($name !== "" && $feedback !== "") {
        $entry = "$name: $feedback" . PHP_EOL;
        file_put_contents($file, $entry, FILE_APPEND); 
        $message = "Thank you! Your feedback has been saved.";
    } else {
        $message = "Please fill in all fields.";
    }
}

if (file_exists($file)) {
    $feedbackList = file($file, FILE_IGNORE_NEW_LINES);
}
?>
<!doctype html>
<html>
<head>
    <title>Feedback System</title>
</head>
<body>

<h2>Leave Your Feedback</h2>

<p><?php echo $message; ?></p>

<form method="post">
    Name:<br>
    <input type="text" name="name"><br><br>

    Feedback:<br>
    <textarea name="feedback"></textarea><br><br>

    <button type="submit">Submit</button>
</form>

<hr>

<h3>Previous Feedback</h3>
<ul>
<?php foreach ($feedbackList as $item): ?>
    <li><?php echo htmlspecialchars($item); ?></li>
<?php endforeach; ?>
</ul>

</body>
</html>
