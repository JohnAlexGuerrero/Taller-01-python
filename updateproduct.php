<?php 
    include 'databases/db.php';

    $producto =$_GET['cod'];
    $costo_prod =$_POST['costo'];
    $cantidad =$_POST['cantidad'];
    $iva_prod =$_POST['iva'];
    $utilidad =$_POST['ganancia'];

    $hari_ini = date("d-m-Y");//fecha de ingreso de producto
    $contador=1;
    $cost_iva_prod =$costo_prod * (($iva_prod/100)+1);//precio de porducto + iva
    $transaccion ='IN-'.date("Y").'-'.$contador;

    if ($conn->query('')) {
        # code...
    }
    $sql ="CALL product_add_new('$codigo','$producto','$und','$categoria')";

    if ($conn->query($sql)===true) {
      echo "<script languaje='javascript'>alert('Producto regisrado con exito')</script>";
      header("refresh:0;url=index.php");
          
  }else{
      echo "Error:".$sql."<br>".$conn->error;
  }

?>