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

		$busqueda=$_POST['busqueda'];
		$sql = "SELECT * FROM articulos
		WHERE (nombreArticulo) LIKE '%$busqueda%'";
		$result = $conn->query($sql);

	}else{

		$sql = "SELECT * FROM articulos";
		$result = $conn->query($sql);
	}

	$conn->close();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Libros</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/css/font-awesome.min.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/estiloDePersonas.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/imagen.css">
</head>
<body >

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">My Store Online</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="../admi/index.php">Home</a></li>
      <li><a href="../admi/personas.php">Personas</a></li>
      <li><a href="../admi/articulos.php">Articulos</a></li>
      <li><a href="../admi/Ventas.php">VENTAS</a></li>
      
    </ul>
  </div>
</nav>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	
	<div class="panel panel-primary">
		<div class="panel-heading">
		<strong>Articulos</strong>

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
			    	<td><?php echo $row["precio"]?></td>
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
			<a href="registraLibro.php">Nuevo Libro</a>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>