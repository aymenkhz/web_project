<?php
require_once 'join.php';
session_start();

$db = "web_project";
$user = "root";
$pass = "";
$host = "localhost";

$dbc = connect($host, $user, $pass, $db );
$id = $_GET['code'];
if (!empty($_GET['code'])){
    $id = $_GET['code'];
}
$val = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$isValid = filter_var($id, FILTER_VALIDATE_INT);
//$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (empty($isValid)){
    throw new Exception('ID is invalid');
}
deleteProd($dbc, $id);

echo "<script>location.href='PDetails.php'</script>";
die;
