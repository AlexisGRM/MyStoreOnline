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
	if(isset($_POST["btnBorrar"])){
		$libroID = $_POST["articuloID"];
		//Codigo para ejecutar query
		$sql = "DELETE FROM articulos
				WHERE articuloID = $articuloID";

		echo $sql;
		$result = $conn->query($sql);
		$conn->close();

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /Ejercicio6/admi/artiulos.php");

		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Eliminar registro de Libro</title>
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
<!------------------------------------------------------------------------------------------------>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Eliminar Articulo</strong>
		</div>
		<div class="panel-body">
			<?php 
			if(isset($result) || $result->row_num>0){
				$row = $result->fetch_assoc();
			?>

				<p>¿Esta seguro de eliminar el siguiente registro?</p>
				<strong>ID: </strong><span><?php echo $row["articuloID"]?></span><br>
				<strong>Nombre Del Articulo: </strong><span><?php echo $row["nombreArticulo"]?></span>

				<form method="POST" class="form-horizontal" role="form">
					<input type="hidden" name="articuloID" id="articuloID" value="<?php echo $row["articuloID"]?>">
				    <button class="btn btn-primary" name="btnBorrar">Borrar</button>
				    <a href="../sesion/sesionDePersonas.php">regresar</a>
				</form>
				<?php
			} //Fin del IF?>

		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>