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
	if(isset($_POST["btnActualizar"])){
		$personaID = $_POST["personaID"];
		$nombre = $_POST["nombre"];
		$apellidoPaterno = $_POST["apellidoPaterno"];
		$apellidoMaterno = $_POST["apellidoMaterno"];
		$domicilio = $_POST["domicilio"];
		$telefono = $_POST["telefono"];
		$correo = $_POST["correo"];

		//Codigo para ejecutar query
		$sql = "UPDATE personas
				SET nombre='$nombre', apellidoPaterno='$apellidoPaterno', apellidoMaterno='$apellidoMaterno', domicilio='$domicilio', telefono='$telefono', correo='$correo'
				WHERE personaID = $personaID";

		echo $sql;
		$result = $conn->query($sql);

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
	<title>Modificar registro de persona.</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/imagen.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/estilo.css">
</head>
<body background="../imageBiblio.jpg">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Biblioteca Vitual</a>
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
			<strong>Modificar Persona</strong>
		</div>
		<div class="panel-body">
			<?php 
			if(isset($result) || $result->row_num>0){
				$row = $result->fetch_assoc();
			?>
				<form method="POST" class="form-horizontal" role="form">
					<input type="hidden" name="personaID" id="personaID" value="<?php echo $row["personaID"]?>">

					<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Nombre:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row["nombre"] ?>">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Apellido Paterno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Apellido" name="apellidoPaterno" placeholder="Apellido Paterno" value="<?php echo $row["apellidoPaterno"] ?>">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-sm-1" for="email">Apellido Materno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Apellido" name="apellidoMaterno" placeholder="Apellido Materno" value="<?php echo $row["apellidoMaterno"] ?>">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Domicilio">Domicilio:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Domicilio" name="domicilio" placeholder="Domicilio" value="<?php echo $row["domicilio"] ?>">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Telefono">Telefono:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Telefono" name="telefono" placeholder="Telefono" value="<?php echo $row["telefono"] ?>">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-sm-1" for="Correo">Correo:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Correo" name="correo" placeholder="correo" value="<?php echo $row["correo"] ?>">
			      </div>
			    </div>

				    <button class="btn btn-primary" name="btnActualizar">Actualizar</button>
				    <a href="index.php">regresar</a>
				</form>
				<?php
			} //Fin del IF?>

		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>