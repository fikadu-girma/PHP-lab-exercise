<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ajax']) && $_POST['ajax'] == '1') {
    $num1 = $_POST['num1'] ?? '';
    $num2 = $_POST['num2'] ?? '';
    $operation = $_POST['operation'] ?? '';

    if ($num1 === '' || $num2 === '' || !is_numeric($num1) || !is_numeric($num2)) {
        echo "Please enter valid numbers.";
        exit;
    }

    $num1 = floatval($num1);
    $num2 = floatval($num2);

    switch ($operation) {
        case "add":
            echo "Result: " . ($num1 + $num2);
            break;
        case "sub":
            echo "Result: " . ($num1 - $num2);
            break;
        case "mul":
            echo "Result: " . ($num1 * $num2);
            break;
        case "div":
            echo ($num2 == 0) ? "Cannot divide by zero." : "Result: " . ($num1 / $num2);
            break;
        default:
            echo "Please select a valid operation.";
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }
        .calculator {
            background: white;
            padding: 20px;
            width: 300px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }
        input, select, button {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
        }
        .result {
            font-weight: bold;
            text-align: center;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>Simple Calculator</h2>
    <form id="calcForm">
        <input type="number" name="num1" id="num1" placeholder="Enter first number" required>
        <input type="number" name="num2" id="num2" placeholder="Enter second number" required>
        <select name="operation" id="operation" required>
            <option value="">Select Operation</option>
            <option value="add">Add</option>
            <option value="sub">Subtract</option>
            <option value="mul">Multiply</option>
            <option value="div">Divide</option>
        </select>
        <button type="submit">Calculate</button>
    </form>
    <div class="result" id="result"></div>
</div>

<script>
document.getElementById('calcForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const num1 = document.getElementById('num1').value;
    const num2 = document.getElementById('num2').value;
    const operation = document.getElementById('operation').value;

    const formData = new URLSearchParams();
    formData.append('num1', num1);
    formData.append('num2', num2);
    formData.append('operation', operation);
    formData.append('ajax', '1');
    
    fetch(window.location.href, {
        
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: formData.toString(),
        
    })
    .then(response => response.text())
    .then(result => {
        document.getElementById('result').innerText = result;
    })
    .catch(error => {
        document.getElementById('result').innerText = "Error: " + error;
    });
});

</script>

</body>
</html>
