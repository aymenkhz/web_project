<?php
require_once 'join.php';
session_start();

$db = "web_project";
$user = "root";
$pass = "";
$host = "localhost";

$dbc = connect($host, $user, $pass, $db );
$id = $_GET['id'];
if (!empty($_GET['id'])){
    $id = $_GET['id'];
}
$val = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$isValid = filter_var($id, FILTER_VALIDATE_INT);
//$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (empty($isValid)){
    throw new Exception('ID is invalid');
}
deleteRecord($dbc, $id);

header("Location: /user_mang.php");
die;
