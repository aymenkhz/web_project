<?php
require_once 'join.php';

$dbc = connect($host,$user, $pass, $db );
//if ($dbc instanceof mysqli){
//    echo "Client info: ".$dbc->client_info."\n";
//    echo "Client version: ".$dbc->client_version. "\n";
//$records = [];
$records = fetchProd($dbc);
//    var_dump($records);
//}

?>
<html>
<head>
    <title>select all from mysql table</title>
</head>
<body>
<h1> products management </h1>
<table border="1">
    <thead>
    <tr>
        <th>code</th>
        <th>id</th>
        <th>nom</th>
        <th>description</th>
        <th>type</th>
        <th>price</th>
        <th>category</th>
        <th>quantity</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (count($records) > 0):
        foreach ($records as $record): ?>
            <tr>
                <td><?php echo $record->code;?></td>
                <td><?php echo $record->id;?></td>
                <td><?php echo $record->nom;?></td>
                <td><?php echo $record->description;?></td>
                <td><?php echo $record->type;?></td>
                <td><?php echo $record->prix;?></td>
                <td><?php echo $record->category;?></td>
                <td><?php echo $record->quantity;?></td>
                <td><a href="delProd.php?code=<?php echo $record->code;?>">Delete</a></td>
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
<a href="submit.php">add a new product</a>
</body>
</html>
