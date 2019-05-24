<?php
    include '../databases/db.php';

    $empresa = $_GET['emp'];
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

<div class="container col-sm-10">
  <div class="row">
    <div class="col-sm-9">
      <h2><?php echo $empresa;?></h2>
      <h5><?php echo $nit;?></h5>
      <p>Resumen de facturas</p>
    </div>
    <div class="col-sm-3">
    <br>
      <a  type="button" class="btn btn-outline-info" href="nueva_factura.php?proveedor=<?php echo $empresa;?>&nit=<?php echo $nit;?>">Ingresar factura</a>
    </div>
  </div>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Factura de venta</th>
        <th>Fecha</th>
        <th>Vencimiento</th>
        <th>Dias</th>
        <th>Estado</th>
        <th>Total</th>
        <th>Vencido</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

      <?php

          $sql="CALL bill_query('$nit')";

          $result =$conn->query($sql);

          if($row=$result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>".$row['number_fact']."</td>
                      <td>".$row['fecha_fact']."</td>
                      <td>".row['fecha_fact_venc']."</td>
                      <td>0</td>
                      <td>".row['estado']."</td>
                      <td>$".row['total_fact']."</td>
                      <td>$ 1.078.415</td>              
                      <td><button class='btn btn-link'  data-toggle='modal' data-target='#myModal'>pagar</button></td>
                    </tr>";

            }
          }else{
            echo "<div class='alert alert-light'>
            <center>
            <img src='../images/vendedor_icon.png' width='50'><strong> No hay facturas registrados!</strong> Registra algunas facturas.
            </center></div>";
        }
      ?>
    </tbody>
  </table>
  <hr>
  <td><span><h4>Total facturas $ 3,089,000 </h4> </span></td>
</div>

<div class="container">

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Recibo de pago <span class="text-danger"> No. 324356</span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" metod="post">
            <div class="container my-3">
              <div class="row col-sm-10">
                <div class="col-sm-4"><span>Fecha</span></div>
                <div class="col-sm-8"><input type="date" class="form-control" palceholder="DD / MM / AAAA" name="fecha"></div>
              </div>
            </div>
            <div class="container my-3">
              <div class="row col-sm-10">
                <div class="col-sm-4"><span>Factura No.</span></div>
                  <div class="col-sm-8">
                  <select name="factura" class="form-control" id="">
                    <option value="">-Seleccione-</option>
                    <option value="">FV-25085</option>
                    <option value="">FV-25085</option>
                    <option value="">FV-25085</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="input-group mb-3 my-3 col-sm-10">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control" placeholder="Valor total de factura" id="usr" name="username" enable="yes">
              </div>
            </div>
            <div class="container">
              <div class="input-group mb-3 my-3 col-sm-10">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control" placeholder="Valor recibo" id="usr" name="username">
              </div>
            </div>   
            <div class="container">
              <div class="input-group mb-3 my-3 col-sm-10">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control" placeholder="saldo factura" id="usr" name="username">
              </div>
            </div>
            <div class="container  my-3 col-sm-12">
               <p><textarea class="form-control" placeholder="Observaciones" id="usr" name="username"></textarea></p> 
            </div>       
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>


</body>
</html>
