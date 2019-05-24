<?php

    require_once ("../databases/db.php");

    $empresa =strtoupper($_POST['empresa']);
    $nit =$_POST['nit'];
    $ciudad =strtoupper($_POST['ciudad']);
    $address =strtoupper($_POST['address']);
    $email =strtoupper($_POST['email']);
    $telefono =$_POST['phone'];
    $sellman =strtoupper($_POST['sellman']);
    $contacto =$_POST['sell-phone'];

    $sql="INSERT INTO proveedor(nameproveedor,nitprov,ciudadprov,addressprov,telefonoprov,emailprov,sellman,telefono)
     VALUES('$empresa','$nit','$ciudad','$address','$telefono','$email','$sellman','$contacto')";

if ($conn->query($sql)===true) {
    echo "<script languaje='javascript'>alert('Proveedor regisrado con exito')</script>";
    header("refresh:0;url=index.php");
        
}else{
    echo "Error:".$sql."<br>".$conn->error;
}

?>