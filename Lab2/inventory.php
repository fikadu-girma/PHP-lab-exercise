<?php
$file = "inventory.json";

$products = file_exists($file)
    ? json_decode(file_get_contents($file), true)
    : [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $price = trim($_POST["price"]);

    if ($name !== "" && $price !== "") {

        $products[] = [
            "name" => $name,
            "price" => $price,
            "added_on" => date("Y-m-d H:i:s")
        ];

        file_put_contents($file, json_encode($products, JSON_PRETTY_PRINT));

        $message = "Product added successfully!";
    } else {
        $message = "Please enter product name and price.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Inventory</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; padding:20px; }
        .box { background:#fff; padding:20px; border-radius:10px; width:450px; margin:auto; }
        input, button { padding:10px; width:100%; margin-top:10px; }
        table { width:100%; margin-top:15px; border-collapse:collapse; }
        th, td { padding:8px; border-bottom:1px solid #ccc; }
        th { background:#333; color:#fff; }
        .msg { color:green; font-weight:bold; }
    </style>
</head>
<body>

<div class="box">
    <h2>📦 Product Inventory System</h2>

    <?php if(isset($message)) echo "<p class='msg'>$message</p>"; ?>

    <form method="post">
        <input type="text" name="name" placeholder="Enter product name">
        <input type="number" step="0.01" name="price" placeholder="Enter price">
        <button type="submit">Add Product</button>
    </form>

    <h3>🛍 Product List</h3>

    <?php if(empty($products)): ?>
        <p>No products yet.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Price ($)</th>
                <th>Added On</th>
            </tr>
            <?php foreach($products as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p["name"]) ?></td>
                <td><?= htmlspecialchars($p["price"]) ?></td>
                <td><?= $p["added_on"] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

</body>
</html>
