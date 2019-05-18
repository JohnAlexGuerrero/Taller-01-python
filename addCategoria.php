<?php
    include 'databases/db.php';

    $categoria=strtoupper($_POST['categoria']);
    $image=$_POST['image'];

    $count_codigo="SELECT COUNT(codcatg) AS number FROM categoria";
    $result=$conn->query($count_codigo);

    while ($row=$result->fetch_assoc()) {
        $cod=100+$row['number'];
    } ;
    
    $sql = "INSERT INTO categoria(codcatg,nomcatg,image)VALUES('$cod','$categoria','$image')";

    $conn->query($sql);
    header("refresh:0; url=index.php");
    echo $cod;
?>