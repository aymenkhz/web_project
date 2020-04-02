<?php
session_start();
require_once 'join.php';

$dbc = connect($host,$user, $pass, $db );
//if ($dbc instanceof mysqli){
//    echo "Client info: ".$dbc->client_info."\n";
//    echo "Client version: ".$dbc->client_version. "\n";
$records = [];
//$data = [];
$records = fetchAll($dbc);
//   var_dump($records);
if(isset($_POST['login_btn']))   {
    $email = $_POST['email_l'];
    $password = $_POST['password_l'];
    checkUser($dbc, $email, $password);
}
if (isset($_POST['submit_btn'])) {
    echo "<script>location.href='register.php'</script>";
}
//var_dump($_SESSION);
//var_dump($_POST);
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="log.css">
</head>

<body>

<div class="hero">
    <h1> bi3a w charya</h1>
    <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()">Log In</button>
            <button type="button" class="toggle-btn" onclick="register()">Register</button>
        </div>
        <div class="social-icon">
            <img src="t.png" alt="go">
            <img src="f.png" alt="ahe">
            <img src="g.png" alt="ad">
            <img src="in.png" alt="ad">
        </div>
        <form action="" method="post" id="login" class="input-group">
            <input type="email" class="input-field" placeholder="Email" name="email_l" required>
            <input type="password" class="input-field" placeholder="Enter password" name="password_l" required>
            <input type="checkbox" class="check-box"> <span>Remember password</span>
            <button type="submit" class="submit-btn" name="login_btn">Log In</button>
        </form>
        <form action="register.php" method="post" id="register" class="input-group">
            <input type="text" class="input-field" placeholder="First Name" name="fname" required>
            <input type="text" class="input-field" placeholder="Last Name" name="lname" required>
            <input type="number" class="input-field" placeholder="Phone number" name="phone" required>
            <input type="email" class="input-field" placeholder="Email" name="email" required>
            <input type="text" class="input-field" placeholder="Adress" name="adress" required>
            <input type="password" class="input-field" placeholder="Enter password" name="password" required>
            <input type="password" class="input-field" placeholder="Conform password" name="passwordc" required>
            <select name="typecpt" id="typecpt">
                <option value="student">Student</option>
                <option value="startup">Start Up</option>
                <option value="simple">Simple</option>
            </select><br>
            <input type="checkbox" class="check-box"> <span>I agree to the terms & conditions</span>
            <button type="submit" class="submit-btn" name="submit_btn">Register</button>
        </form>
    </div>
</div>
<script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");

    function register() {
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
    }

    function login() {
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0";
    }
</script>
</body>

</html>