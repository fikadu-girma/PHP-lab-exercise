<?php
session_start();

$prizes = ["🎁 Gift Card", "💰 $10 Cash", "🍕 Free Pizza", "🎟 Movie Ticket", "😢 Try Again"];
$selectedPrize = "";
$historyFile = __DIR__ . "/spin_history.txt";
$leaderboardFile = __DIR__ . "/leaderboard.json";

// Load leaderboard
$leaderboard = file_exists($leaderboardFile)
    ? json_decode(file_get_contents($leaderboardFile), true)
    : [];

// Initialize session
if (!isset($_SESSION['score'])) $_SESSION['score'] = 0;
if (!isset($_SESSION['player'])) $_SESSION['player'] = "";

// Handle name submit
if (isset($_POST['player_name'])) {
    $_SESSION['player'] = trim($_POST['player_name']);
    if (!isset($leaderboard[$_SESSION['player']])) {
        $leaderboard[$_SESSION['player']] = 0;
        file_put_contents($leaderboardFile, json_encode($leaderboard, JSON_PRETTY_PRINT));
    }
}

// Handle spin
if (isset($_POST['spin_value']) && $_SESSION['player'] !== "") {
    $i = intval($_POST['spin_value']);
    $selectedPrize = $prizes[$i];

    if ($selectedPrize !== "😢 Try Again") {
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
<title>Spin & Win — Leaderboard Edition</title>
<style>
body{font-family:Arial;background:#020617;color:white;text-align:center;}
.container{margin-top:40px}
#wheel{margin:25px auto;width:260px;height:260px;border-radius:50%;
border:10px solid #facc15;background:conic-gradient(#ff595e 0 72deg,#ffca3a 72 144deg,
#8ac926 144 216deg,#1982c4 216 288deg,#6a4c93 288 360deg);
transition:transform 4s ease-out;position:relative;}
.pointer{width:0;height:0;border-left:18px solid transparent;border-right:18px solid transparent;
border-bottom:30px solid #eab308;margin:0 auto;}
button,input{padding:10px 20px;font-size:16px;border-radius:10px;border:none;}
input{margin-top:10px;width:200px}
button{background:#facc15;cursor:pointer}
button:hover{background:#fde047}
.result{margin-top:15px;font-size:22px}
.score{margin-top:5px;font-size:20px;color:#fde047}
.box{background:#111827;border-radius:12px;border:1px solid #334155;
width:420px;max-width:92%;margin:15px auto;padding:12px}
h3{margin-bottom:6px}
.item{border-bottom:1px solid #334155;padding:6px 0;font-size:14px}
table{width:100%;color:#e5e7eb}
th,td{padding:6px;font-size:14px}
th{color:#fde047}
</style>
</head>
<body>

<div class="container">
<h1>🎡 Spin & Win — Leaderboard Edition</h1>

<?php if($_SESSION['player'] === ""): ?>
<form method="post">
    <input type="text" name="player_name" placeholder="Enter your name" required>
    <button>Start Game</button>
</form>
<?php else: ?>

<div class="score">
 Player: <b><?php echo htmlspecialchars($_SESSION['player']); ?></b> |
 Score: <b><?php echo $_SESSION['score']; ?></b>
</div>

<audio id="spinSound" src="https://assets.mixkit.co/sfx/preview/mixkit-fast-spin-999.wav"></audio>
<audio id="winSound" src="https://assets.mixkit.co/sfx/preview/mixkit-video-game-win-2016.wav"></audio>

<div class="pointer"></div>
<div id="wheel"></div>

<form id="spinForm" method="post">
    <input type="hidden" name="spin_value" id="spin_value">
    <button type="button" onclick="spinWheel()">Spin 🎯</button>
</form>

<?php if($selectedPrize): ?>
<div class="result">You won: <b><?php echo $selectedPrize; ?></b></div>
<?php endif; ?>

<div class="box">
<h3>🏆 Leaderboard</h3>
<table>
<tr><th>Player</th><th>Score</th></tr>
<?php arsort($leaderboard);
foreach($leaderboard as $name=>$score): ?>
<tr><td><?php echo htmlspecialchars($name); ?></td><td><?php echo $score; ?></td></tr>
<?php endforeach; ?>
</table>
</div>

<div class="box">
<h3>📜 Recent Spins</h3>
<?php foreach(array_slice(array_reverse($history),0,8) as $line): ?>
<div class="item"><?php echo htmlspecialchars($line); ?></div>
<?php endforeach; ?>
</div>

<?php endif; ?>
</div>

<script>
const wheel=document.getElementById("wheel");
const spinSound=document.getElementById("spinSound");
const winSound=document.getElementById("winSound");

function spinWheel(){
    spinSound.play();
    const i=Math.floor(Math.random()*5);
    const deg=360/5;
    const stop=(6*360)+(deg*i)+18;
    wheel.style.transform=`rotate(${stop}deg)`;
    document.getElementById("spin_value").value=i;
    setTimeout(()=>{winSound.play();document.getElementById("spinForm").submit()},4200);
}
</script>

</body>
</html>
