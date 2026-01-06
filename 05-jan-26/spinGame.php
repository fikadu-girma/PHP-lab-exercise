<?php
// Spin result logic
$prizes = ["🎁 Gift Card", "💰 $10 Cash", "🍕 Free Pizza", "🎟 Movie Ticket", "😢 Try Again"];

$result = "";
if (isset($_POST['spin'])) {
    $result = $prizes[array_rand($prizes)];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP Spin Game</title>
<style>
body{
    font-family: Arial;
    background:#0b132b;
    color:white;
    text-align:center;
}
.container{
    margin-top:80px;
}
.wheel{
    margin:20px auto;
    width:200px;
    height:200px;
    border-radius:50%;
    border:8px solid #fca311;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
    background:#14213d;
}
button{
    padding:12px 25px;
    font-size:18px;
    border:none;
    border-radius:8px;
    background:#fca311;
    cursor:pointer;
}
button:hover{
    background:#ffba35;
}
.result{
    margin-top:20px;
    font-size:24px;
}
</style>
</head>
<body>

<div class="container">
    <h1>🎡 PHP Spin & Win Game</h1>

    <div class="wheel">
        <?php echo $result ? $result : "Tap Spin"; ?>
    </div>

    <form method="post">
        <button type="submit" name="spin">Spin</button>
    </form>

    <?php if($result): ?>
        <div class="result">You got: <strong><?php echo $result; ?></strong></div>
    <?php endif; ?>
</div>

</body>
</html>
