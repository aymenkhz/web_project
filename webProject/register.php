<?php
require_once 'join.php';
$date = date("Y-m-d");

$db = "web_project";
$user = "root";
$pass = "";
$host = "localhost";


$passwords = $_POST['password'];
$password = $_POST['passwordc'];

if ($password == $passwords){
//       header("location: submit.php");
$dbc = connect($host, $user, $pass, $db );
$record = [
    'nom' => $_POST['lname'],
    'prenom' => $_POST['fname'],
    'email' => $_POST['email'],
    'tel' => $_POST['phone'],
    'password' => md5($_POST['password']),
    'adress' => $_POST['adress'],
    'typeCpt' => $_POST['typecpt'],
    'date' => $date ];
$newRecord = insertRecord($dbc, $record);
}else{
    echo '<script>alert("you can not type a simple password twice can you ? ;)")</script>';
    echo "<script>location.href='login.php'</script>";
}
//var_dump($newRecord);
?>
<h1>Hello <?php echo $_POST['fname'] ?>, and welcome to bi3a w charya, a website where you can buy or sell good quality products with low price </h1>
<label for="">now use the combination of your email and password to connect and join millions of happy users.</label>
<a href="login.php">connect</a>
