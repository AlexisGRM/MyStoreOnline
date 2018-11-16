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

	//Mostrar confirmacion de borrado
	if(isset($_GET["articuloID"])){
		$articuloID = $_GET["articuloID"];
		
		//Codigo para ejecutar query
		$sql = "SELECT * FROM articulos
				WHERE articuloID = $articuloID";
		$result = $conn->query($sql);
	}

	//Ejecutar el borrado
	if(isset($_POST["btnActualizar"])){
		$articuloID = $_POST["articuloID"];
		$nombreArticulo = $_POST["nombreArticulo"];
		$descripcion = $_POST["descripcion"];
		$precio = $_POST["precio"];
		$categoria = $_POST["categoria"];

		//Codigo para ejecutar query
		$sql = "UPDATE articulos
				SET nombreArticulo='$nombreArticulo', descripcion='$descripcion', precio='$precio', categoria='$categoria'
				WHERE articuloID = $articuloID";

		echo $sql;
		$result = $conn->query($sql);

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /Ejercicio6/sesion/sesionDePersonas.php");
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar registro de Libros</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/imagen.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/estilo.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">My Store Online</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
</nav>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Modificar Articulo</strong>
		</div>
		<div class="panel-body">
			<?php 
			if(isset($result) || $result->row_num>0){
				$row = $result->fetch_assoc();
			?>
				<form method="POST" class="form-horizontal" role="form">
					<input type="hidden" name="articuloID" id="articuloID" value="<?php echo $row["articuloID"]?>">

					<div class="form-group">
			      <label class="control-label col-sm-1" for="email">nombre Articulo:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="nombreArticulo" name="nombreArticulo" placeholder="nombreArticulo" value="<?php echo $row["nombreArticulo"] ?>">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Descripcion:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" value="<?php echo $row["descripcion"] ?>">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="precio">Precio:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Precio" name="precio" placeholder="Precio" value="<?php echo $row["precio"] ?>">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="categoria">Categoria:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Categoria" name="categoria" placeholder="Categoria" value="<?php echo $row["categoria"] ?>">
			      </div>
			    </div>

				    <button class="btn btn-primary" name="btnActualizar">Actualizar</button>
				    <a href="../sesion/sesionDePersonas.php">regresar</a>
				</form>
				<?php
			} //Fin del IF?>

		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>