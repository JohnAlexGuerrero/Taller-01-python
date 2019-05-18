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
<div class="container col-sm-4">
  <h2>Registro de proveedores</h2>
  <form action="addproveedor.php" method="post">
    <div class="form-group">
      <label for="">Empresa:</label>
      <input type="text" class="form-control" id="email" autocompleted="off" placeholder="Nombre proveedor" name="empresa" required>
    </div>
    <div class="form-group">
      <label for="">nit:</label>
      <input type="text" class="form-control" id="pwd" placeholder="888.888.888-1" autocompleted="off" name="nit" required>
    </div>
    <div class="form-group">
      <label for="">ciudad:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Nombre ciudad" name="ciudad" required>
    </div>
    <div class="form-group">
      <label for="">dirección:</label>
      <input type="text" class="form-control" id="pwd" autocompleted="off" placeholder="address" name="address" required>
    </div>
    <div class="form-group">
      <label for="">Télefono:</label>
      <input type="text" class="form-control" id="pwd" placeholder="7777777" autocompleted="off" name="phone" >
    </div>
    <div class="form-group">
      <label for="">Correo electrónico:</label>
      <input type="email" class="form-control" id="pwd" placeholder="xxxxx@xxxx.com" name="email" autocompleted="off" required>
    </div>
    <div class="form-group">
      <label for="">Vendedor:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Nombres" name="sellman" autocompleted="off" required>
    </div>
    <div class="form-group">
      <label for="">Télefono:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Numero de contacto" name="sell-phone" autocompleted="off" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>
</div>

</body>
</html>