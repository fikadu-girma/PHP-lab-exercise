<?php 
    $age = 0;
    if(isset($_POST['submit'])) {
        $age = $_POST['age'];
        }
    if($age == 0) {
        $msg = "";
    } elseif($age < 18 ) {
        $msg = "Not Eligible to vote";
    } elseif($age >= $age) {
        $msg = "Eligigble to vote";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditional statement</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .cont {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .form {
            height: 320px;
            width: 400px;
            background-color: #054164ff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 20px;
        }
        label {
            display: block;
            font-size: 60px;
            color: #fff;
            align-self: center;
        }
        input {
            height: 55px;
            width: 130px;
            align-self: center;
            font-size: 20px;
            text-align: center;
        }
        button {
            width: 90px;
            align-self: center;
            margin-top: 10px;
            margin-right: 45px;
            padding: 5px 15px;
            border-radius: 10px;
            font-size: 18px;
        }
        h3 {
            font-size: 40px;
            color: #39c91cff;
           
        }
    </style>
</head>
<body>
    <div class="cont">
    <form class="form" action="" method="POST">
        <label for="age">Age</label>
        <br>
        <input 
        value="<?= (isset($age) && $age != 0) ? $age : "" ?>" name="age" placeholder="18" type="number">
        <button name="submit" type="submit">Submit</button> 
    </form>
     <h3><?= $msg ?></h3>

    </div>
</body>
</html>