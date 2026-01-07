<!DOCTYPE html>
<html>
<body>
<?php
$fruits = array("Apple", "Banana", "Cherry", "Date");
echo "<ul>";
foreach ($fruits as $fruit) {
    echo "<li>$fruit</li>";
}
echo "</ul>";
echo "Count: " . count($fruits);
?>
</body>
</html>
