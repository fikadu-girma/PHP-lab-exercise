<?php 
$name = " Fikadu Girma";
$id = 1270;
$department = " Software Enginnering";
$favQuote = " No Pain No Gain";
$date=date('D d,M,Y H:i:s');
$colors=[
    'r' => rand(0,255),
    'g' => rand(0,255),
    'b' => rand(0,255),
];

$bgColor = "rgb({$colors['r']},{$colors['g']},{$colors['b']})";
$h1Color = "rgb({$colors['b']},{$colors['r']},{$colors['g']})";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project</title>
    <style>
        * {
           padding: 0;
           margin: 0;
           box-sizing: border-box;

        }
        .cont {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .card {
            padding: 80px 160px;
            background-color: <?= $bgColor ?>;
            border: none;

        }
        h1 {
            color: <?= $h1Color ?>;
        }
        p {
            font-size: 25px;
            cursor: pointer;
            padding: 15px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="cont">
    <div class="card">
        <h1>Mini Project</h1>
        <h3>Name:<?= $name ?></h3>
        <h3>Id:<?= "UGPR/".$id."/16" ?></h3>
        <h3>Department:<?= $department ?></h3>
        <h3>Favourite Quote:<?= $favQuote ?></h3>
        <h3>Date:<?= $date ?></h3>

        <p onclick="window.location.reload()">&circlearrowleft;</p>
        <p style="color: #3b3737ff">click reload button above for other color of head text and card background color</p>
    </div>
    </div>
</body>
</html>