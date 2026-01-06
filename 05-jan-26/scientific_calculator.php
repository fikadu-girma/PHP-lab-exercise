<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $expression = $_POST["expression"] ?? "";

    // Allow safe math functions only
    $allowed = [
        "sin","cos","tan","asin","acos","atan",
        "sqrt","log","log10","pow","pi","abs",
        "exp","round","ceil","floor"
    ];

    $safe = preg_replace("/[^0-9+\-.*\/()% ,a-zA-Z]/", "", $expression);

    foreach ($allowed as $fn) {
        $safe = str_replace($fn, "($fn)", $safe);
    }

    try {
        $result = eval("return $safe;");
    } catch (Throwable $e) {
        $result = "Error";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Neon Scientific Calculator</title>
<style>
body{
  background:radial-gradient(circle at top,#020617,#000);
  font-family:Poppins,Arial;color:#e5e7eb;text-align:center;
}
h1{
  color:#38bdf8;text-shadow:0 0 18px #0ea5e9;
}
.calc-box{
  width:420px;max-width:92%;margin:25px auto;padding:20px;
  border-radius:20px;
  background:linear-gradient(120deg,#0f172a70,#02061750);
  border:1px solid #38bdf880;backdrop-filter:blur(12px);
  box-shadow:0 0 25px #38bdf833,inset 0 0 30px #14b8a622;
}
input{
  width:100%;padding:14px;border-radius:14px;
  border:1px solid #38bdf8;background:#020617;
  color:#f8fafc;font-size:18px;outline:none;
}
.screen{
  margin-bottom:12px;text-align:right;
}
.grid{
  margin-top:12px;display:grid;
  grid-template-columns:repeat(4,1fr);gap:10px;
}
button{
  padding:12px;border-radius:14px;border:none;
  background:#38bdf8;color:#020617;
  font-weight:700;font-size:15px;
  box-shadow:0 0 14px #38bdf8;cursor:pointer;
}
button.op{background:#a78bfa;box-shadow:0 0 14px #a78bfa;}
button.eq{background:#facc15;box-shadow:0 0 14px #facc15;}
button:hover{filter:brightness(1.2)}
</style>
</head>
<body>

<h1>✨ Neon Scientific Calculator</h1>

<div class="calc-box">
<form method="post">
  <div class="screen">
      <input type="text" name="expression"
       placeholder="Enter expression e.g. sin(1)+sqrt(9)"
       value="<?php echo htmlspecialchars($_POST['expression'] ?? ''); ?>">
  </div>

  <input class="screen" readonly value="Result: <?php echo $result; ?>">

  <div class="grid">
    <button type="button" onclick="add('sin(')">sin</button>
    <button type="button" onclick="add('cos(')">cos</button>
    <button type="button" onclick="add('tan(')">tan</button>
    <button class="op" type="button" onclick="add('^')">^</button>

    <button type="button" onclick="add('sqrt(')">√</button>
    <button type="button" onclick="add('log(')">log</button>
    <button type="button" onclick="add('pi')">π</button>
    <button class="op" type="button" onclick="add('/')">/</button>

    <button type="button" onclick="add('7')">7</button>
    <button type="button" onclick="add('8')">8</button>
    <button type="button" onclick="add('9')">9</button>
    <button class="op" type="button" onclick="add('*')">*</button>

    <button type="button" onclick="add('4')">4</button>
    <button type="button" onclick="add('5')">5</button>
    <button type="button" onclick="add('6')">6</button>
    <button class="op" type="button" onclick="add('-')">-</button>

    <button type="button" onclick="add('1')">1</button>
    <button type="button" onclick="add('2')">2</button>
    <button type="button" onclick="add('3')">3</button>
    <button class="op" type="button" onclick="add('+')">+</button>

    <button type="button" onclick="add('0')">0</button>
    <button type="button" onclick="add('.')">.</button>
    <button type="button" onclick="clr()">C</button>
    <button class="eq" name="calc">=</button>
  </div>
</form>
</div>

<script>
const field=document.querySelector("input[name='expression']");
function add(v){field.value+=v;}
function clr(){field.value="";}
</script>

</body>
</html>

