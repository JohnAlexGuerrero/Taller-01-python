<?php 
    include 'databases/db.php';

    $producto =strtoupper($_POST['product']);
    $codigo ="103".$_POST['codigo'];
    $und =$_POST['und'];
    $categoria =$_POST['grupo'];
    //$valorund =$_POST['pventa'];
    //$costoprod =$_POST['pcosto'];

    $sql ="CALL product_add_new('$codigo','$producto','$und','$categoria')";

    if ($conn->query($sql)===true) {
      echo "<script languaje='javascript'>alert('Producto regisrado con exito')</script>";
      header("refresh:0;url=index.php");
          
  }else{
      echo "Error:".$sql."<br>".$conn->error;
  }

?>