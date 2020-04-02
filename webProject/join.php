<?php
//session_start();
$db = "web_project";
$user = "root";
$pass = "";
$host = "localhost";
function connect ($host,$user, $pass, $db ){
    $dbc = new mysqli($host,$user, $pass, $db );
    if ($dbc->connect_error){
        die("Cannot connect to database:\n".$dbc->connect_error. "\n".$dbc->connect_errno);
    }
    return $dbc;
}
function fetchAll(mysqli $dbc){
    $data = [];

    $sql = 'select * from `users`';

    $results = $dbc->query($sql);

    if($results->num_rows > 0){
        while ($row = $results->fetch_object()){
//        while ($row = $results->fetch_assoc()){
            $data[] = $row;
        }

    }
    return $data;
}
function insertRecord(mysqli $dbc, array $record){
    $sql = "INSERT INTO `users`";
    $sql.= "(`nom`,`prenom`,`email`,`tel`,`password`,`adress`,`typeCpt`,`dateCpt`)";
    $sql.= "VALUES";
    $sql.= "(";
    $sql.= "'".$record['nom']."',";
    $sql.= "'".$record['prenom']."',";
    $sql.= "'".$record['email']."',";
    $sql.= "'".$record['tel']."',";
    $sql.= "'".$record['password']."',";
    $sql.= "'".$record['adress']."',";
    $sql.= "'".$record['typeCpt']."',";
    $sql.= "'".$record['date']."'";
    $sql.= ");";

    $result = $dbc->query($sql);
    if (!$result){
        throw new Exception('Cannot insert records');
    }
    $record['id'] = $dbc->insert_id;
    return $record;
}
function deleteRecord(mysqli $dbc, $id){
    $sql = "DELETE FROM `users` WHERE id = '".$id."'";
    $result = $dbc->query($sql);
    if (!$result){
        throw new Exception('Cannot delete records');
    }
}
function checkUser(mysqli $dbc, $email, $password){
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $dbc->query($sql);

    if($result->num_rows > 0){
        header("location: home.php");
    }else{
//        header("location: login.php");
        echo '<script>alert("oooops you should connect often so you do not forget how to login next time ;)")</script>';
    }
}
function fetchProd(mysqli $dbc){
    $data = [];

    $sql = 'select * from `products`';

    $results = $dbc->query($sql);

    if($results->num_rows > 0){
        while ($row = $results->fetch_object()){
//        while ($row = $results->fetch_assoc()){
            $data[] = $row;
        }

    }
    return $data;
}
function insertProd(mysqli $dbc, array $record){
    $sql = "INSERT INTO `products`";
    $sql.= "(`id`,`nom`,`description`,`type`,`prix`,`category`,`quantity`,`date`)";
    $sql.= "VALUES";
    $sql.= "(";
    $sql.= "'".$record['id']."',";
    $sql.= "'".$record['pname']."',";
    $sql.= "'".$record['description']."',";
    $sql.= "'".$record['type']."',";
    $sql.= "'".$record['prix']."',";
    $sql.= "'".$record['category']."',";
    $sql.= "'".$record['quantity']."',";
    $sql.= "'".$record['date']."'";
    $sql.= ");";

    $result = $dbc->query($sql);
    if (!$result){
        throw new Exception('Cannot insert records');
    }
    $record['id'] = $dbc->insert_id;
    return $record;
}
function deleteProd(mysqli $dbc, $code){
    $sql = "DELETE FROM `products` WHERE code = '".$code."'";
    $result = $dbc->query($sql);
    if (!$result){
        throw new Exception('Cannot delete records');
    }
}

?>