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

<div class="container mt-3 col-sm-8">

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
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>

    <br>
    <ul class="list-group" id="myList">

      <?php
           include 'databases/db.php';

            $sql = "SELECT * FROM productos p
            JOIN unidades u WHERE (p.undprod=u.codund) ORDER BY 2 ASC";

            $result=$conn->query($sql);
            $row_cnt=$result->num_rows;

              if($row_cnt > 0){
                  while ($row = $result->fetch_assoc()) {
                    echo "<li class='list-group-item'>
                            <div class='row'>
                              <div class='col-sm-1'>
                                <img src='".$row['imagen_prod']."' alt='' width='30'>
                              </div>
                                <div class='col-sm-11' ><h5>".$row['nombre_prod']."</h5></div>
                              </div>
                              <div class='row'>
                                <div class='col-sm-1' ></div>
                                <div class='col-sm-3' >codigo:".$row['codigo_prod']."</div>
                                <div class='col-sm-4' >STOCK: 0	    ".$row['nomunidad']."</div>
                                <div class='col-sm-4' >VALOR UNITARIO $ 34000</div>
                              </div>
                            </li>";
                      
                      //<td><a class='btn btn-primary btn-sm' href='form-update.php?cod=".$row['codprod']."'>Ingresar</a></td>
                      //<td><a href='delete.php' class='btn btn-danger btn-sm'>Delete</a></td></tr>";
                  }
              }else{
                  echo "<div class='alert alert-light'>
                  <img src='images/empty_product_icon.png' width='50'><strong> No hay productos!</strong> You should <a href='#' class='alert-link'>read this message</a>.
                </div>";
              }
             
      ?>
     

    
      
    <li class="list-group-item">
    <img src="images/product_default.png" alt="">
    <h5>VINILUX T2 BLANCO CANECA</h5>
    <div class="row">
      <div class="col-sm-6" >STOCK: 34	UND</div>
      <div class="col-sm-6" >VALOR UNITARIO $ 34000</div>
    </div>
    </li>
  </ul>  
</div>


<!--
<div class="container col-sm-4">
    <input class="form-control" id="myInput" type="text" placeholder="Buscar producto..">
</div>

<div class="container mt-3 col-sm-12">
  
  <br>
<div class="container">
<table class="table table-hover">
    <thead>
      <tr>
        <th>item</th>
        <th>Código</th>
        <th>Descripción</th>
        <th>Unidad</th>
        <th>Stock</th>
        <th>Costo unitario</th>
        <th>Precio Unitario</th>
      </tr>
    </thead>

    <tbody  id="myTable">

        
    </tbody>
  </table>
  <hr>
</div>
-->


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
        <form action="addproduct.php" method="post">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="pd">Descripción:</label>
                    <input type="prod" class="form-control" id="prod" autocomplete="off" placeholder="Descripción de producto" name="product" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                
                    <label for="cod">Código ó Referencia:</label>
                <div class="form-inline" >
                    <span class="form-control my3">103</span>
                    <input type="text" class="form-control my-2 col-sm-10" id="cod" autocomplete="off" placeholder="referencia de cinco caracteres" name="codigo" required>
                </div>
             </div>
            </div>
                <div class="form-group">
                <div class="col-sm-8">
                    <label for="und">Unidad de empaque:</label>
                    <select name="und" id="" class="form-control">
                    <option value="">-Seleccionar-</option>
                    
                    <?php
                      include 'db.php';

                      $sql=mysqli_query($conn, "SELECT * FROM unidades ORDER BY 2 ASC")
                      or die('Error: '.mysqli_error($sql));
            
                      while ($data = mysqli_fetch_assoc($sql)) {
                        echo "<option value='".$data['codund']."'>".$data['nomunidad']."</option>";
          
                        $i++;
                     }
                      
                    ?>

                    </select>
                </div>
            <div class="form-gruop">
              
                <div class="col-sm-8">
                    <label for="und">Categoria ó grupo:</label>
                    <select name="grupo" id="" class="form-control">
                    <option value="0" >-Seleccionar-</option>

                    <?php
                      include 'db.php';

                      $sql=mysqli_query($conn, "SELECT * FROM categoria ORDER BY 1 ASC")
                      or die('Error: '.mysqli_error($sql));
            
                      while ($data = mysqli_fetch_assoc($sql)) {
                        echo "<option value='".$data['codcatg']."'>".$data['nomcatg']."</option>";
          
                        $i++;
                     }
                      
                    ?>

                    </select>
                    
                </div>
            </div>  
            <br>
            <!--
            <div class="col-sm-8">
                <!--div class="form-group"--><!--
                    <label for="cod">Precio Costo:</label>
                <div class="form-inline">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control my-2" id="cod" placeholder="Valor unitario" name="pcosto" autocomplete="off">
                </div>
            </div>
            <div class="col-sm-8">
                <!--div class="form-group"--><!--
                  <label for="cod">Precio Venta:</label>
                <div class="form-inline">
                
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control my-2" id="cod" placeholder="Valor unitario" name="pventa" autocomplete="off">
                </div>
            </div> 
            </div> -->
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

<!--
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
-->


