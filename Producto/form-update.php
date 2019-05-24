<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/stiles.css">


    <title>Ferreteria</title>
</head>
<body class="modal-update">
    

<!-- The newproduct -->
<div class="#" id="ingreso">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">
          <?php
            include '../databases/db.php';

                $prod=$_GET['cod'];

                $sql="CALL view_product('$prod')";

                $result = $conn->query($sql);
                $row=$result->num_rows;

              if($row > 0){
                  while ($row = $result->fetch_assoc()) {
                      echo "<td><img src='".$row['imagen_prod']."' alt='' width='150'></td><br>";
                      echo "<td>".$row['producto']."</td>";
                      $unidad =$row['nomunidad'];
                  }
                }
           ?></h3>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="update_inventary.php" method="post">
            <div class="form-inline">
                <div class="col-sm-3 my-3">
                    <input type="text" class="form-control" id="prod" autocomplete="off" placeholder="Cantidad" name="cantidad" required>
                </div>
                <div class="col-sm-3">
                <label for="pd"><?php echo $unidad; ?></label>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Costo" autocomplete="off" id="usr" name="costo" required>
                </div>
              </div>
              <div class="col-sm-3" >
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Iva" name="iva">
                  <div class="input-group-append">
                  <span class="input-group-text">%</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-4" >
                <div class="input-group mb-3">
                  <div class="form-group">
                    <select class="form-control" id="sel1" name="sellist1">
                      <option>-Utilidad-</option>
                      <option>10 %</option>
                      <option>20 %</option>
                      <option>30 %</option>
                      <option>15 %</option>
                    </select>
                    
                  </div>
                </div>
                
              </div>
                  
            
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ingresar</button>
          <a type="button" href="index.php" class="btn btn-danger" data-dismiss="modal">Close</a>
        </div>
        
      </div>
    </div>
  </div>
  </div>

  </body>
</html>