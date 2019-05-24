<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ferreteria</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h2>Proveedores</h2>
        </div>
        <div class="container col-sm-4">
            <input class="form-control" id="myInput" type="text" placeholder="Busca proveedor">
        </div>
        <div class="col-sm-4">
            <a type="button" class="btn btn-primary"  href="form-proveedor.php">
                Nuevo proveedor
            </a>
        </div>
    </div>
    

      <br>
      <ul class="list-group col-sm-6" id="myList">

      <?php
           require_once '../databases/db.php';

            $sql = "CALL list_proveedor()";

            $result=$conn->query($sql);

            if($row=$result->num_rows > 0){
              while ($row = $result->fetch_assoc()) {
                echo "<div class='list-group'>
                <a href='facturas.php?emp=".$row['nameproveedor']."&nit=".$row['nitprov']."' class='list-group-item list-group-item-action'>
                  <div class='row'>
                      <div class='col-sm-12' ><h5>".$row['nameproveedor']."</h5></div>
                  </div>
                          <div class='row'>
                            <div class='col-sm-12' >".$row['nitprov']."</div>
                            <hr>
                            <div class='col-sm-12' ><img src='../images/city_icon.png' width='20'>  ".$row['ciudadprov']."</div>
                            <div class='col-sm-6' ><img src='../images/vendedor_icon.png' width='20'>  ".$row['sellman']."</div>
                            <div class='col-sm-6' ><img src='../images/telefono_icon.png' width='18'>  ".$row['telefono']."</div>
                            <div class='col-sm-12' >Valor Unitario   $.</div>
                          </div>
                </a>
              </div>";
                  //<td><a class='btn btn-primary btn-sm' href=>Ingresar</a></td>
                  //<td><a href='delete.php' class='btn btn-danger btn-sm'>Delete</a></td></tr>";
              }
          }else{
              echo "<div class='alert alert-light'>
              <center>
              <img src='../images/vendedor_icon.png' width='50'><strong> No hay proveedores registrados!</strong> Registra algunos proveedores.
              </center></div>";
          }
            
      ?>
      </ul>

    </div>
      <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
    </script>

</body>
</html>
