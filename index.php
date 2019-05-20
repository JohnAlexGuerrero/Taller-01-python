<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <title>Ferreteria</title>

</head>

<body>

<div class="container col-sm-8">
  <h2>Inventario de productos</h2>
</div>

<div class="container mt-3 col-sm-6">

  <div class="row">
      <div class="col-sm-8" ></div>
        <div class="col-sm-4" >
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newproduct">
            Nuevo Producto
          </button>
        </div>
      </div>
      <br>
      <div class="container col-sm-8">
        <input class="form-control" id="myInput" type="text" placeholder="Search product..">
      </div>

      <br>
      <ul class="list-group" id="myList">

      <?php
           include 'databases/db.php';

            $sql = "CALL query_inventary()";

            $result=$conn->query($sql);

            if($row=$result->num_rows > 0){
              while ($row = $result->fetch_assoc()) {
                echo "<div class='list-group'>
                <a href='form-update.php?cod=".$row['codigo_prod']."' class='list-group-item list-group-item-action'>
                  <div class='row'>
                      <div class='col-sm-1'>
                        <img src='".$row['imagen_prod']."' alt='' width='30'>
                      </div>
                      <div class='col-sm-11' ><h5>".$row['producto']."</h5></div>
                  </div>
                          <div class='row'>
                            <div class='col-sm-1' ></div>
                            <div class='col-sm-3' >Código:  ".$row['codigo_prod']."</div>
                            <div class='col-sm-4' >Stock: ".$row['stock_prod']. "    ".$row['nomunidad']."</div>
                            <div class='col-sm-4' >Valor Unitario   $".$row['precio_venta_prod']."</div>
                          </div>
                </a>
              </div>";
                  //<td><a class='btn btn-primary btn-sm' href=>Ingresar</a></td>
                  //<td><a href='delete.php' class='btn btn-danger btn-sm'>Delete</a></td></tr>";
              }
          }else{
              echo "<div class='alert alert-light'>
              <center>
              <img src='images/empty_product_icon.png' width='50'><strong> No hay productos!</strong> Crea algunos productos.
              </center></div>";
          }
            
      ?>
      </ul>  
      <ul class="pagination justify-content-end">
        <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
        <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
      </ul>
    </div>

    <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
            $("#myList a").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
      </script>

</body>
</html>

<div class="container">
  <!-- Button to Open the Modal -->
  
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoria">
    Categoria
  </button>
  <a type="button" class="btn btn-primary"  href="form-proveedor.php">
    Registro proveedor
  </a>

  <!-- The newproduct -->
  <div class="modal" id="newproduct">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Nuevo Producto</h3>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="addproduct.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="pd">Descripción:</label>
                    <input type="prod" class="form-control" id="prod" autocomplete="off" maxlength="60" placeholder="Descripción de producto" name="product" required>
                </div>
            </div>
            <div class="col-sm-12"> 
                <div class="form-group">
                
                    <label for="cod">Código ó Referencia:</label>
                    <div class="form-inline" >
                      <span class="form-control my3">103</span>
                      <input type="text" class="form-control my-2 col-sm-10" id="cod" maxlength="5" autocomplete="off" placeholder="referencia de cinco números" name="codigo" required>
                    </div>
                  
                </div>
          
                <div class="form-group">
                  <div class="col-sm-8">
                    <label for="und">Unidad de empaque:</label>
                    <select name="und" id="" class="form-control">
                      <option value="">-Seleccionar-</option>
                    
                      <?php
                        include 'databases/db.php';

                        $sql=mysqli_query($conn, "SELECT * FROM unidades ORDER BY 2 ASC")
                        or die('Error: '.mysqli_error($sql));
            
                        while ($data = mysqli_fetch_assoc($sql)) {
                          echo "<option value='".$data['codund']."'>".$data['nomunidad']."</option>";
                          $i++;
                        }
                      
                      ?>
                    </select>
                  </div>
                </div>
            
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="file" class="form-control my-2" id=""  name="photo" >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>


<!-- The newproduct -->
<div class="modal" id="categoria">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Nueva Categoria</h3>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="addcategoria.php" method="post">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="pd">Nombre de categoria:</label>
                    <input type="text" class="form-control" id="prod" autocomplete="off" placeholder="Ingrese categoria ó grupo" name="categoria" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="file" class="form-control" id="prod" autocomplete="off" name="image">
                </div>
            </div>
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  </div>



