<?php
$file = "submissions.csv";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $msg   = trim($_POST["message"]);

    if ($name && $email && $msg) {

        $handle = fopen($file, "a");

        fputcsv($handle, [$name, $email, $msg, date("Y-m-d H:i:s")]);

        fclose($handle);
        echo "<p>Message saved!</p>";
    } else {
        echo "<p>Please fill in all fields.</p>";
    }
}
?>

<form method="post">
    <input type="text" name="name" placeholder="Your Name"><br><br>
    <input type="email" name="email" placeholder="Your Email"><br><br>
    <textarea name="message" placeholder="Your Message"></textarea><br><br>
    <button type="submit">Send</button>
</form>

<hr>

<h3>Saved Messages:</h3>
<?php
if (file_exists($file)) {
    $handle = fopen($file, "r");

    echo "<ul>";
    while (($row = fgetcsv($handle)) !== false) {
        echo "<li><strong>$row[0]</strong> ($row[1]) — $row[2] <em>[$row[3]]</em></li>";
    }
    echo "</ul>";

    fclose($handle);
}
?>
