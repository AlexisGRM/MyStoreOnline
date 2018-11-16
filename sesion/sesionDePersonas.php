<?php 
  //Código para conectar
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName = "tienda";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbName);
  $conn->set_charset("utf8");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  //Codigo para ejecutar query
  if(isset($_POST['btnBuscar'])){

/////////////////////////////////////////////////////////////////ES PARA REALIZAR UNA BUSQUEDA DE ALGUNA VENTA
    $busqueda=$_POST['busqueda'];
    $sql = "SELECT * FROM articulos
    WHERE (nombreArticulo,descripcion) LIKE '%$busqueda%'";
    $result = $conn->query($sql);

  }else{

    $sql = "SELECT * FROM articulos";
    $result = $conn->query($sql);
  }
//////////////////////////////////////////////////////////////////ES PARA INSERTAR UNA NUEVA VENTA
  if(isset($_POST["btnEnviar"])){
    $nombreArticulo = $_POST["articulo"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $categoria = $_POST["categoria"];

    //Codigo para ejecutar query
    $sql = "INSERT INTO articulos(nombreArticulo, descripcion, precio, categoria)value('$nombreArticulo','$descripcion','$precio','$categoria')";
    $result = $conn->query($sql);
//////////////////////////////////////////////////////////////////ES PARA SELECCIONAR A LA PERSONA CON SU SESION

    $sql = "SELECT nombre FROM personas";  
    $result = $conn->query($sql);

    //Si se creo el registro lo redirecciona al index
    if($result){
      header("location: /Ejercicio6/sesion/sesionDePersonas.php");
    }
  }

  $conn->close();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MyStoreOnline</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../Styles6/imagen.css">
   <link rel="stylesheet" type="text/css" href="../Styles6/estiloDePersonas.css">
  <link rel="stylesheet" type="text/css" href="../Styles6/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<!------------------------------------------------------------------------------------------------>
<body>

<nav class="navbar navbar-inverse" style="font-size: 21px;margin-bottom: 40px ">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li class="active"><a href="../index.php">My Store Online</a></li>
      <li><a href="">BIENVENIDO</a></li>
    </ul>
    <ul class="pull-right nav navbar-nav">
      <li><a href="../index.php">Cerrar Sesion</a></li>
    </ul>

  </div>
</nav>
<!------------------------------------------------------------------------------------------------>
<div class="container">
  
  <div class="panel panel-primary">
    <div class="panel-heading">
    <strong>Mis ventas</strong>
    </div>

    <form method="POST" class="form-horizontal" role="form" style="margin-top:20px;">
        <div class="form-group col-md-11" style="margin-left: 15px;">
           <label class="control-label col-sm-1" for="email"></label>
          <div class="col-sm-11">
            <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar Articulo">
          </div>
        </div>
        <div class="col-md-1" style="padding-bottom: 15px;">
            <button class="btn btn-primary pull-right" name="btnBuscar">Buscar</button>
        </div>
      </form>

    <div class="panel-body">
      <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Articulo</th>
          <th>Descripcion</th>
          <th>Precio</th>
          <th>Categoria</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php 
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {?>
          <tr>
            <td><?php echo $row["articuloID"]?></td>
            <td><?php echo $row["nombreArticulo"]?></td>
            <td><?php echo $row["descripcion"]?></td>
            <td>$<?php echo $row["precio"]?></td>
            <td><?php echo $row["categoria"]?></td>
            <td>
              <a href="../productos/borrarArticulo.php?articuloID=<?php echo $row['articuloID'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
              <a href="../productos/modificarArticulo.php?articuloID=<?php echo $row['articuloID'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
            </td>
          </tr>
        <?php } //End while
        }//End if
        else {
            echo "0 results";
        }
       ?>
      </tbody>
      </table>
   
    </div><!-- Cierre de panel body -->
  </div><!-- Cierre de panel primary -->
  </div><!-- Cierre de container -->
<!------------------------------------------------------------------------------------------------>
<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <strong>Nueva Venta</strong>
    </div>
    <div class="panel-body">
      <form method="POST" class="form-horizontal" role="form">
        <div class="form-group">
            <label class="control-label col-sm-1" for="email">Nombre del Articulo:</label>
            <div class="col-sm-11">
              <input type="text" class="form-control" id="Articulo" name="articulo" placeholder="Articulo" autocomplete="off" required>
            </div>
          </div>
        <div class="form-group">
            <label class="control-label col-sm-1" for="email">Descripcion:</label>
            <div class="col-sm-11">
              <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" autocomplete="off" required>
            </div>
          </div>
        <div class="form-group">
            <label class="control-label col-sm-1" for="Precio">Precio:</label>
            <div class="col-sm-11">
              <input type="text" class="form-control" id="Precio" name="precio" placeholder="Precio" autocomplete="off" required>
            </div>
          </div>
        <div class="form-group">
            <label class="control-label col-sm-1" for="Categoria">Categoria:</label>
            <div class="col-sm-11">

            <select class="form-control" id="Categoria" name="categoria">
              <option value="">..........</option>
              <option value="ELECTRONICA">ELECTRONICA</option>
              <option value="ELECTRODOMESTICOS">ELECTRODOMESTICOS</option>
              <option value="AUTOS">AUTOS</option>
              <option value="INMUEBLES">INMUEBLES</option>
              <option value="LIBROS Y REVISTAS">LIBROS Y REVISTAS</option>
              <option value="MUSICA">MUSICA</option>
            </select>
            </div>
          </div>
          <button class="btn btn-primary" name="btnEnviar">Ofrecer</button>
        
      </form>
    </div><!-- Cierre de panel body -->
  </div><!-- Cierre de panel primary -->
  </div><!-- Cierre de container -->
<!------------------------------------------------------------------------------------------------>

</body>
</html>