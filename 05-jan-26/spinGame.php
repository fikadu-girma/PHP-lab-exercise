<?php
session_start();

$prizes = ["🎁 Gift Card", "💰 $10 Cash", "🍕 Free Pizza", "🎟 Movie Ticket", "😢 Try Again"];
$selectedPrize = "";
$historyFile = __DIR__ . "/spin_history.txt";

// Initialize session score
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

// Handle spin result
if (isset($_POST['spin_value'])) {
    $index = intval($_POST['spin_value']);
    $selectedPrize = $prizes[$index];

    // Update score (no points for "Try Again")
    if ($selectedPrize !== "😢 Try Again") {
        $_SESSION['score'] += 10;
    }

    // Save to file
    $entry = date("Y-m-d H:i:s") . " | Prize: $selectedPrize | Score: {$_SESSION['score']}\n";
    file_put_contents($historyFile, $entry, FILE_APPEND);
}

// Load history (if exists)
$history = file_exists($historyFile) ? file($historyFile, FILE_IGNORE_NEW_LINES) : [];
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP Spin Game – Score & History</title>
<style>
body{font-family:Arial;background:#0b132b;color:white;text-align:center;}
.container{margin-top:60px;}
#wheel{margin:25px auto;width:260px;height:260px;border-radius:50%;
border:10px solid #fca311;
background:conic-gradient(#ff595e 0 72deg,#ffca3a 72 144deg,#8ac926 144 216deg,
#1982c4 216 288deg,#6a4c93 288 360deg);
transition:transform 4s ease-out;position:relative;}
.segment-label{position:absolute;width:50%;left:50%;top:50%;
transform-origin:left;font-weight:bold;}
.segment1{transform:rotate(-36deg) translate(-5px,-105px);}
.segment2{transform:rotate(36deg) translate(-5px,-105px);}
.segment3{transform:rotate(108deg) translate(-5px,-105px);}
.segment4{transform:rotate(180deg) translate(-5px,-105px);}
.segment5{transform:rotate(252deg) translate(-5px,-105px);}
.pointer{width:0;height:0;border-left:18px solid transparent;border-right:18px solid transparent;
border-bottom:30px solid #ffba35;margin:0 auto;}
button{padding:12px 28px;margin-top:18px;font-size:18px;border:none;border-radius:10px;
background:#fca311;cursor:pointer;}
button:hover{background:#ffba35;}
.result{margin-top:18px;font-size:22px;}
.score{margin-top:10px;font-size:20px;color:#ffca3a;}
.history-box{margin:20px auto;width:400px;max-width:90%;
background:#111827;border-radius:12px;padding:15px;border:1px solid #333;}
.history-box h3{margin-bottom:10px;}
.history-item{font-size:14px;border-bottom:1px solid #333;padding:6px 0;}
</style>
</head>
<body>

<div class="container">
    <h1>🎡 PHP Spin & Win — Score + History</h1>

    <div class="score">Current Score: <strong><?php echo $_SESSION['score']; ?></strong></div>

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

    <div class="history-box">
        <h3>📜 Spin History</h3>
        <?php if ($history): ?>
            <?php foreach (array_reverse($history) as $line): ?>
                <div class="history-item"><?php echo htmlspecialchars($line); ?></div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="history-item">No spins yet.</div>
        <?php endif; ?>
    </div>
</div>

<script>
const wheel = document.getElementById("wheel");

function spinWheel() {
    const prizeIndex = Math.floor(Math.random() * 5);
    const spins = 5;
    const degreesPerPrize = 360 / 5;
    const stopAngle = (spins * 360) + (degreesPerPrize * prizeIndex) + 18;

    wheel.style.transform = `rotate(${stopAngle}deg)`;
    document.getElementById("spin_value").value = prizeIndex;

    setTimeout(() => document.getElementById("spinForm").submit(), 4200);
}
</script>

</body>
</html>
