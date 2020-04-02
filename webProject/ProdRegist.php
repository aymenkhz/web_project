<?php
session_start();
$date = date("Y-m-d");
require_once 'join.php';

//if ($dbc instanceof mysqli){
//    echo "Client info: ".$dbc->client_info."\n";
//    echo "Client version: ".$dbc->client_version. "\n";
$records = [];

$id = 1 ;
if (isset($_POST['submit_btn']) ){
//       header("location: submit.php");
    $dbc = connect($host, $user, $pass, $db );
    $record = [
        'id' => $id,
        'pname' => $_POST['pname'],
        'type' => $_POST['type'],
        'prix' => $_POST['prix'],
        'category' => $_POST['category'],
        'quantity' => $_POST['quantity'],
        'description' => $_POST['description'],
        'date' => $date ];
    $newRecord = insertProd($dbc, $record);
    echo '<script>alert("it looks like you need some money ;)")</script>';
    echo "<script>location.href='PDetails.php'</script>";
    }else{
        echo '<script>alert("it looks like you failed on this one ;)")</script>';
        echo "<script>location.href='submit.php'</script>";
    }