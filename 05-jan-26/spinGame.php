<?php
$prizes = ["🎁 Gift Card", "💰 $10 Cash", "🍕 Free Pizza", "🎟 Movie Ticket", "😢 Try Again"];
$selectedPrize = "";

if (isset($_POST['spin_value'])) {
    $index = intval($_POST['spin_value']);
    $selectedPrize = $prizes[$index];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP Spin Game – Animated</title>
<style>
body{
    font-family: Arial;
    background:#0b132b;
    color:white;
    text-align:center;
}
.container{
    margin-top:70px;
}
#wheel{
    margin:25px auto;
    width:260px;
    height:260px;
    border-radius:50%;
    border:10px solid #fca311;
    background:conic-gradient(#ff595e 0deg 72deg,
                              #ffca3a 72deg 144deg,
                              #8ac926 144deg 216deg,
                              #1982c4 216deg 288deg,
                              #6a4c93 288deg 360deg);
    position:relative;
    transition:transform 4s ease-out;
}
.segment-label{
    position:absolute;
    width:50%;
    left:50%;
    top:50%;
    transform-origin:left;
    color:white;
    font-size:14px;
    font-weight:bold;
}
.segment1{ transform:rotate(-36deg) translate(-5px,-105px); }
.segment2{ transform:rotate(36deg) translate(-5px,-105px); }
.segment3{ transform:rotate(108deg) translate(-5px,-105px); }
.segment4{ transform:rotate(180deg) translate(-5px,-105px); }
.segment5{ transform:rotate(252deg) translate(-5px,-105px); }

.pointer{
    width:0;
    height:0;
    border-left:18px solid transparent;
    border-right:18px solid transparent;
    border-bottom:30px solid #ffba35;
    margin:0 auto;
}
button{
    padding:12px 28px;
    margin-top:18px;
    font-size:18px;
    border:none;
    border-radius:10px;
    background:#fca311;
    cursor:pointer;
}
button:hover{ background:#ffba35; }

.result{
    margin-top:22px;
    font-size:24px;
}
</style>
</head>
<body>

<div class="container">
    <h1>🎡 Animated PHP Spin & Win</h1>

    <div class="pointer"></div>

    <div id="wheel">
        <div class="segment-label segment1">🎁</div>
        <div class="segment-label segment2">💰</div>
        <div class="segment-label segment3">🍕</div>
        <div class="segment-label segment4">🎟</div>
        <div class="segment-label segment5">😢</div>
    </div>

    <form id="spinForm" method="post">
        <input type="hidden" name="spin_value" id="spin_value">
        <button type="button" onclick="spinWheel()">Spin</button>
    </form>

    <?php if($selectedPrize): ?>
        <div class="result">You won: <strong><?php echo $selectedPrize; ?></strong></div>
    <?php endif; ?>
</div>

<script>
const wheel = document.getElementById("wheel");

function spinWheel() {
    const prizeIndex = Math.floor(Math.random() * 5);
    const spins = 5; // full rotations
    const degreesPerPrize = 360 / 5;
    const stopAngle = (spins * 360) + (degreesPerPrize * prizeIndex) + 18;

    wheel.style.transform = `rotate(${stopAngle}deg)`;

    document.getElementById("spin_value").value = prizeIndex;

    setTimeout(() => {
        document.getElementById("spinForm").submit();
    }, 4200);
}
</script>

</body>
</html>
