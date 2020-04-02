<?php
require_once 'join.php';

$dbc = connect($host,$user, $pass, $db );
//if ($dbc instanceof mysqli){
//    echo "Client info: ".$dbc->client_info."\n";
//    echo "Client version: ".$dbc->client_version. "\n";
//$records = [];
$records = fetchAll($dbc);
//    var_dump($records);
//}

?>
<html>
<head>
    <title>select all from mysql table</title>
</head>
<body>
<h1> user management </h1>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>prenom</th>
        <th>email</th>
        <th>tel</th>
        <th>password</th>
        <th>adress</th>
        <th>typeCpt</th>
        <th>dateCpt</th>
        <th>nbrProd</th>
        <th>nbrLogs</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (count($records) > 0):
        foreach ($records as $record): ?>
            <tr>
                <!--                    <td>--><?php //echo $record['id'];?><!--</td>-->
                <!--                    <td>--><?php //echo $record['username'];?><!--</td>-->
                <!--                    <td>--><?php //echo $record['pasword'];?><!--</td>-->
                <!--                    <td>--><?php //echo $record['email'];?><!--</td>-->
                <td><?php echo $record->id;?></td>
                <td><?php echo $record->nom;?></td>
                <td><?php echo $record->prenom;?></td>
                <td><?php echo $record->email;?></td>
                <td><?php echo $record->tel;?></td>
                <td><?php echo $record->password;?></td>
                <td><?php echo $record->adress;?></td>
                <td><?php echo $record->typeCpt;?></td>
                <td><?php echo $record->dateCpt;?></td>
                <td><?php echo $record->nbrProd;?></td>
                <td><?php echo $record->nbrLogs;?></td>
                <td><a href="delete.php?id=<?php echo $record->id;?>">Delete</a></td>
            </tr>

        <?php    endforeach;


    else: ?>
        <tr>
            <td colspan="11">Cannot find any records</td>
        </tr>
    <?php endif;
    ?>
    </tbody>
</table>
</body>
</html>

