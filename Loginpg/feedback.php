<?php
$file = "feedback.json";

if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$feedbackList = json_decode(file_get_contents($file), true);

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"]);
    $feedback = trim($_POST["feedback"]);

    if ($name === "" || $feedback === "") {
        $message = "Please fill in all fields.";
    } else {

        $newFeedback = [
            "name" => htmlspecialchars($name),
            "feedback" => htmlspecialchars($feedback),
            "time" => date("Y-m-d H:i:s")
        ];

        // Add to list and save back to file
        $feedbackList[] = $newFeedback;
        file_put_contents($file, json_encode($feedbackList, JSON_PRETTY_PRINT));

        $message = "Thank you! Your feedback has been saved.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback Board</title>
    <style>
        body { font-family: Arial; background:#f4f6ff; padding:40px; }
        .box { background:#fff; padding:20px; border-radius:10px; max-width:600px; margin:auto; box-shadow:0 5px 15px rgba(0,0,0,.1);}
        input, textarea { width:100%; padding:10px; margin:8px 0; border-radius:6px; border:1px solid #ccc; }
        button { background:#4b6cff; color:#fff; padding:10px 15px; border:none; border-radius:6px; cursor:pointer; }
        .card { background:#eef1ff; padding:12px; border-radius:8px; margin-top:10px; }
        .name { font-weight:bold; }
        .time { font-size:12px; color:#666; }
    </style>
</head>

<body>
<div class="box">
    <h2>🌟 Customer Feedback Board</h2>

    <form method="post">
        <input type="text" name="name" placeholder="Your Name">
        <textarea name="feedback" rows="4" placeholder="Write your feedback..."></textarea>
        <button type="submit">Submit Feedback</button>
    </form>

    <p><?= $message ?></p>

    <h3>Previous Feedback</h3>

    <?php foreach ($feedbackList as $item): ?>
        <div class="card">
            <div class="name"><?= $item["name"] ?></div>
            <div class="time"><?= $item["time"] ?></div>
            <p><?= $item["feedback"] ?></p>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
