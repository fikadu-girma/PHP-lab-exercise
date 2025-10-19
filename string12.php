<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>String Tools – Count & Convert Case</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f2f6;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      width: 400px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      text-align: center;
    }

    h2 {
      color: #2f3640;
      margin-bottom: 20px;
    }

    textarea {
      width: 100%;
      height: 100px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #dcdde1;
      border-radius: 5px;
      resize: none;
      outline: none;
    }

    button {
      margin-top: 15px;
      padding: 10px 20px;
      font-size: 16px;
      background-color: #00a8ff;
      border: none;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0097e6;
    }

    .result {
      margin-top: 25px;
      text-align: left;
    }

    .result p {
      background: #f5f6fa;
      padding: 10px;
      border-radius: 5px;
      font-weight: bold;
      color: #2f3640;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>String Tools(Total characters, toUpperCase, toLowerCase)</h2>
    <form method="post">
      <textarea name="text" placeholder="Type your text here..."></textarea><br>
      <button type="submit">Process Text</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST['text'];

        // Perform all functions
        $length = strlen($text);
        $upper = strtoupper($text);
        $lower = strtolower($text);
        $title = ucwords(strtolower($text)); // optional: Title Case

        echo "<div class='result'>";
        echo "<p><strong>Original Text:</strong> $text</p>";
        echo "<p><strong>Total Characters:</strong> $length</p>";
        echo "<p><strong>Uppercase:</strong> $upper</p>";
        echo "<p><strong>Lowercase:</strong> $lower</p>";
        echo "<p><strong>Title Case:</strong> $title</p>";
        echo "</div>";
    }
    ?>
  </div>
</body>
</html>
