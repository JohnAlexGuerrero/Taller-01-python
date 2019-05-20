<?php 
    include 'databases/db.php';

    $producto =strtoupper($_POST['product']);
    $codigo ="103".$_POST['codigo'];
    $und =$_POST['und'];
    $name_photo=$_FILES['photo']['name'];
    $type_photo=$_FILES['photo']['type'];
    $size_photo=$_FILES['photo']['size'];

    if (empty($name_photo)) {
      $ruta="images/product_default.png";
    }else {
      move_uploaded_file($_FILES['photo']['tmp_name'],"images/products/".$name_photo);
      $ruta="images/products/".$name_photo;
    }

    $sql ="CALL add_new_product('$codigo','$producto','$und','$ruta')";

    if ($conn->query($sql)===true) {
      
      $sql_inventary="CALL add_prod_inventary('$producto')";

      if ($conn->query($sql_inventary)===true) {
        echo "<div class='alert alert-light'>
              <center>
              <img src='images/product_default.png' width='50'><strong> Producto fué creado con exito!</strong> Crea algunos productos.
              </center></div>";
        header("refresh:0;url=index.php");
      }
          
  }else{
      echo "Error:".$sql."<br>".$conn->error;
  }


?>