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

 $sql = "SELECT * FROM vistaventas WHERE categoria='ELECTRODOMESTICOS'";
    $result = $conn->query($sql);
  

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>MyStoreOnline</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../Styles6/imagen.css">
  <link rel="stylesheet" href="../Styles6/estilo.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li class="active"><a href="../index.php">My Store Online</a></li>
      <li><a href="">ELECTRODOMESTICOS</a></li>
    </ul>

  </div>
</nav>
<div class="container">
  
  <div class="panel panel-primary">
    <div class="panel-heading">
      <strong>Ventas</strong>
    </div>
    <div class="panel-body">
      <table class="table table-striped">
      <thead>
        <tr>
          
          <th>Nombre Persona</th>
          <th>Apellidos</th>
          <th></th>
          <th>Domicilio</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th>Nombre Articulo</th>
          <th>Descripcion</th>
          <th>Precio</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php 
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {?>
          <tr>
            
            <td><?php echo $row["nombrePersona"]?></td>
            <td><?php echo $row["apellidoPaterno"]?></td>
            <td><?php echo $row["apellidoMaterno"]?></td>
            <td><?php echo $row["domicilio"]?></td>
            <td><?php echo $row["telefono"]?></td>
            <td><?php echo $row["correo"]?></td>
            <td><?php echo $row["nombreDeArticulo"]?></td>
            <td><?php echo $row["descripcion"]?></td>
            <td><?php echo $row["precio"]?></td>

            <td>
              <a href="BorrarPrestamo.php?prestamoID=<?php echo $row['prestamoID'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

</body>
</html>