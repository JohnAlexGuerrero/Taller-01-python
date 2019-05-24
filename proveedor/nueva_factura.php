<?php

    
    $empresa=$_GET['proveedor'];
    $nit =$_GET['nit'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="col-sm-9">
      <h2><?php echo $empresa; ?></h2>
      <h5><?php echo $nit; ?></h5>
    </div>        
    <div class="container">
        <form action="ajkjk.php" method="post">
            <div class="row form-inline col-sm-10">
                <div class=" col-sm-2 text-right">
                    <span>Número de factura : </span>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control my-2 col-sm-12" >
                </div>
                <div class=" col-sm-2 text-right">
                    <span>Fecha: </span>
                </div>
               <div class="col-sm-2">
                    <input type="date" class="form-control my-2 " >
                </div>
                    <div class=" col-sm-2 text-right">
                        <span>Vencimiento: </span>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" class="form-control my-2" >
                    </div>
                </div>
                <div class="row">
                    <div class=" col-sm-9">
                    </div>
                    <div class="col-sm-3">
                        <!-- Button to Open the Modal -->
                        <a type="button" class="btn btn-outline-primary" href="../producto/index.php?fct=1232">
                        Ingresar Poductos
                        </a>
                    </div>
                </div>
            </div>
    
  <hr>
  <div class="cointainer col-sm-12">
  <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Detalle</th>
                        <th>Unidad</th>
                        <th>Cantidad</th>
                        <th>Costo Unit</th>
                        <th>iva %</th>
                        <th>Precio Unit</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="myTable">

                    <?php
                        

                        include '../databases/db.php';

                        $sql="CALL query_inventary()";

                        $result = $conn->query($sql);
                        $row=$result->num_rows;

                        if($row > 0){
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row['codigo_prod']."</td>";
                                echo "<td>".$row['producto']."</td>";
                                echo "<td>".$row['nomunidad']."</td></tr>";
                  }
                }
           ?>

                        <tr>
                            <td>12345678</td>
                             <td>bombillo toledo 12w silvania</td>
                            <td>UND</td>
                            <td>100</td>
                            <td>$ 3.456</td>
                            <td>19</td>
                            <td>$ 4.800</td>
                            <td>$ 4.800</td>
                            <td><a href="../Producto/form-update.php?cod=10310098" class="btn btn-primary btn-sm">Ingresar</a></td>
                        </tr>
                    </tbody>
                </table>

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
  </div>
  </div>

  <div class="container">
    <div class="row">
        <div class="col-sm-8"></div>
        <div class="col-sm-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Subtotal</th>
                <th>Iva</th>
                <th>Total Factura</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>$ 1.223.232</td>
                <td>$ 3.23423</td>
                <td>$ 1.234.200</td>
                </tr>
            </tbody>
        </table >
             
        </div>
        
    </div>
    
  </div>
  <div class="container">
    <div class="row">
        <div class="col-sm-8"></div>
        <div class="col-sm-3"><button class="btn btn-primary">Guardar factura</button></div>
    </div>
  </div>
        
  </form>
    </div> 
  
</div>

<div class="container">
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Productos</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="container mt-3">
              <input class="form-control" id="myInput" type="text" placeholder="Buscar producto por código / nombre">
                <br>
                <ul class="list-group" id="myList">
                <?php
                        
                        include '../databases/db.php';

                        $sql="CALL query_inventary()";

                        $result = $conn->query($sql);
                        $row=$result->num_rows;

                        if($row > 0){
                            while ($row = $result->fetch_assoc()) {
                                echo "<li class='list-group-item' id='pdt' >".$row['producto']."</li>";
                  }
                }
           ?>
                
                <li class="list-group-item">Second item</li>
                <li class="list-group-item">Third item</li>
                <li class="list-group-item">Fourth</li>
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


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" >Buscar</button>        
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>


</body>
</html>

