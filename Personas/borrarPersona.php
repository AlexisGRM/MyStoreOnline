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
	if(isset($_GET["personaID"])){
		$personaID = $_GET["personaID"];
		
		//Codigo para ejecutar query
		$sql = "SELECT * FROM personas
				WHERE personaID = $personaID";
		$result = $conn->query($sql);
	}

	//Ejecutar el borrado
	if(isset($_POST["btnBorrar"])){
		$personaID = $_POST["personaID"];
		//Codigo para ejecutar query
		$sql = "DELETE FROM personas
				WHERE personaID = $personaID";

		echo $sql;
		$result = $conn->query($sql);
		$conn->close();

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /Ejercicio6/admi/personas.php");

		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Eliminar registro de persona.</title>
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
			<strong>Eliminar Persona</strong>
		</div>
		<div class="panel-body">
			<?php 
			if(isset($result) || $result->row_num>0){
				$row = $result->fetch_assoc();
			?>

				<p>¿Esta seguro de eliminar el siguien registro?</p>
				<strong>ID: </strong><span><?php echo $row["personaID"]?></span><br>
				<strong>Nombre: </strong><span><?php echo $row["nombre"]." ".$row["apellidoPaterno"]." ".$row["apellidoMaterno"]?></span>

				<form method="POST" class="form-horizontal" role="form">
					<input type="hidden" name="personaID" id="personaID" value="<?php echo $row["personaID"]?>">
				    <button class="btn btn-primary" name="btnBorrar">Borrar</button>
				    <a href="../admi/personas.php">regresar</a>
				</form>
				<?php
			} //Fin del IF?>

		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>