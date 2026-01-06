<?php
session_start();

$prizes = ["🎁 Gift Box", "💰 Cash Reward", "🍔 Free Meal", "🎟 Ticket Pass", "❌ Try Again"];
$selectedPrize = "";
$historyFile = __DIR__ . "/spin_history.txt";
$leaderboardFile = __DIR__ . "/leaderboard.json";

$leaderboard = file_exists($leaderboardFile)
    ? json_decode(file_get_contents($leaderboardFile), true)
    : [];

if (!isset($_SESSION['score'])) $_SESSION['score'] = 0;
if (!isset($_SESSION['player'])) $_SESSION['player'] = "";

if (isset($_POST['player_name'])) {
    $_SESSION['player'] = trim($_POST['player_name']);
    if (!isset($leaderboard[$_SESSION['player']])) {
        $leaderboard[$_SESSION['player']] = 0;
        file_put_contents($leaderboardFile, json_encode($leaderboard, JSON_PRETTY_PRINT));
    }
}

if (isset($_POST['spin_value']) && $_SESSION['player'] !== "") {
    $i = intval($_POST['spin_value']);
    $selectedPrize = $prizes[$i];

    if ($selectedPrize !== "❌ Try Again") {
        $_SESSION['score'] += 10;
        $leaderboard[$_SESSION['player']] += 10;
        file_put_contents($leaderboardFile, json_encode($leaderboard, JSON_PRETTY_PRINT));
    }

    $entry = date("Y-m-d H:i:s") . " | {$_SESSION['player']} | Prize: $selectedPrize | Score: {$_SESSION['score']}\n";
    file_put_contents($historyFile, $entry, FILE_APPEND);
}

$history = file_exists($historyFile) ? file($historyFile, FILE_IGNORE_NEW_LINES) : [];
?>
<!DOCTYPE html>
<html>
<head>
<title>Neon Spin & Win</title>
<style>
body{
    background: radial-gradient(circle at top,#020617,#020617 40%,#000000);
    font-family: Poppins,Arial;
    color:#e5e7eb;
    text-align:center;
}
h1{
    font-size:34px;
    font-weight:900;
    color:#38bdf8;
    text-shadow:0 0 18px #0ea5e9;
}
.neon-box{
    width:480px;max-width:92%;margin:18px auto;padding:20px;
    border-radius:18px;
    background:linear-gradient(120deg,#0f172a80,#02061740);
    border:1px solid #38bdf880;
    backdrop-filter:blur(12px);
    box-shadow:0 0 20px #0ea5e933, inset 0 0 25px #38bdf822;
}
#wheel{
    margin:25px auto;width:280px;height:280px;border-radius:50%;
    border:10px solid #38bdf8;
    background:conic-gradient(#14b8a6 0 72deg,#fb7185 72 144deg,
    #fbbf24 144 216deg,#8b5cf6 216 288deg,#ef4444 288 360deg);
    box-shadow:0 0 28px #38bdf8;
    transition:transform 4s cubic-bezier(.2,.8,.2,1);
}
.pointer{
    width:0;height:0;margin:0 auto;
    border-left:18px solid transparent;border-right:18px solid transparent;
    border-bottom:30px solid #facc15;
    filter:drop-shadow(0 0 8px #fde047);
}
button,input{
    padding:10px 16px;border-radius:12px;
    border:none;font-size:15px;
}
input{
    background:#020617;border:1px solid #38bdf8;color:white;
}
button{
    background:#38bdf8;color:#020617;font-weight:700;
    box-shadow:0 0 15px #38bdf8;
    cursor:pointer;
}
button:hover{filter:brightness(1.2)}
.result{
    margin-top:10px;font-size:20px;color:#fde047;
    text-shadow:0 0 12px #facc15;
}
.score{font-size:18px;margin-bottom:4px}
table{width:100%;margin-top:6px}
td,th{padding:5px}
th{color:#a5f3fc}
.item{border-bottom:1px solid #334155;padding:5px 0;font-size:13px}
</style>
</head>
<body>

<h1>✨ Neon Spin & Win ✨</h1>

<?php if($_SESSION['player']==""): ?>
<div class="neon-box">
    <h3>Enter your name to begin</h3>
    <form method="post">
        <input type="text" name="player_name" placeholder="Player name" required>
        <button>Start</button>
    </form>
</div>

<?php else: ?>
<div class="neon-box">
    <div class="score">
        👤 Player: <b><?php echo htmlspecialchars($_SESSION['player']); ?></b> |
        ⭐ Score: <b><?php echo $_SESSION['score']; ?></b>
    </div>

    <audio id="spinSound" src="https://assets.mixkit.co/sfx/preview/mixkit-fast-spin-999.wav"></audio>
    <audio id="winSound" src="https://assets.mixkit.co/sfx/preview/mixkit-video-game-win-2016.wav"></audio>

    <div class="pointer"></div>
    <div id="wheel"></div>

    <form id="spinForm" method="post">
        <input type="hidden" name="spin_value" id="spin_value">
        <button type="button" onclick="spinWheel()">SPIN 🎮</button>
    </form>

    <?php if($selectedPrize): ?>
        <div class="result">🎉 You won: <b><?php echo $selectedPrize; ?></b></div>
    <?php endif; ?>
</div>

<div class="neon-box">
    <h3>🏆 Leaderboard</h3>
    <table>
        <tr><th>Player</th><th>Score</th></tr>
        <?php arsort($leaderboard);
        foreach($leaderboard as $n=>$s): ?>
        <tr><td><?php echo htmlspecialchars($n); ?></td><td><?php echo $s; ?></td></tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="neon-box">
    <h3>📜 Recent Spins</h3>
    <?php foreach(array_slice(array_reverse($history),0,8) as $line): ?>
        <div class="item"><?php echo htmlspecialchars($line); ?></div>
    <?php endforeach; ?>
</div>

<?php endif; ?>

<script>
const wheel=document.getElementById("wheel");
const spinSound=document.getElementById("spinSound");
const winSound=document.getElementById("winSound");

function spinWheel(){
    spinSound.play();
    const i=Math.floor(Math.random()*5);
    const deg=360/5;
    const stop=(7*360)+(deg*i)+10;
    wheel.style.transform=`rotate(${stop}deg)`;
    document.getElementById("spin_value").value=i;
    setTimeout(()=>{winSound.play();document.getElementById("spinForm").submit()},4200);
}
</script>

</body>
</html>
