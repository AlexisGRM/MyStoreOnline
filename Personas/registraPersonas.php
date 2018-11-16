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

	if(isset($_POST["btnEnviar"])){
		$nombre = $_POST["nombre"];
		$apellidoPaterno = $_POST["apellidoPaterno"];
		$apellidoMaterno = $_POST["apellidoMaterno"];
		$domicilio = $_POST["domicilio"];
		$telefono = $_POST["telefono"];
		$correo = $_POST["correo"];
		$username=$_POST["username"];
		$password=$_POST["password"];

		//Codigo para ejecutar query
		$sql = "INSERT INTO personas(nombre, apellidoPaterno,apellidoMaterno, domicilio, telefono,correo,username,password)value('$nombre','$apellidoPaterno','$apellidoMaterno','$domicilio','$telefono','$correo','$username','$password')";
		

		$result = $conn->query($sql);
	

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /Ejercicio6/index.php");
		}
		
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de personas</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/imagen.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/estiloDePersonas.css">
</head>
<body background="../imageBiblio.jpg">
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">My store online</a>
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
			<strong>Registro</strong>
		</div>
		<div class="panel-body">
			<form method="POST" class="form-horizontal" role="form">
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Nombre:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" autocomplete="off" required>
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Apellido Paterno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Apellido" name="apellidoPaterno" placeholder="Apellido Paterno" autocomplete="off" required>
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Apellido Materno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Apellido" name="apellidoMaterno" placeholder="Apellido Materno" autocomplete="off" required>
			      </div>
			    </div>

				<div class="form-group">
			      <label class="control-label col-sm-1" for="Domicilio">Domicilio:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Domicilio" name="domicilio" placeholder="Domicilio" autocomplete="off" required>
			      </div>
			    </div>

				<div class="form-group">
			      <label class="control-label col-sm-1" for="Telefono">Telefono:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Telefono" name="telefono" placeholder="Telefono" autocomplete="off" required>
			      </div>
			    </div>

			    <div class="form-group">
			      <label class="control-label col-sm-1" for="Correo">Correo:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Correo" name="correo" placeholder="Correo" autocomplete="off" required>
			      </div>
			    </div>

			    <div class="form-group">
			      <label class="control-label col-sm-1" for="username">Usuario:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" autocomplete="off" required>
			      </div>
			    </div>

			    <div class="form-group">
			      <label class="control-label col-sm-1" for="password">Contraseña:</label>
			      <div class="col-sm-11">
			        <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
			      </div>
			    </div>

			     <div class="form-group">
			      <label class="control-label col-sm-1" for="ConfirmaContraseña">Confirmar Contraseña:</label>
			      <div class="col-sm-11">
			        <input type="password" class="form-control" id="ConfirmaContraseña" name="confirmaContraseña" autocomplete="off" required>
			      </div>
			    </div>

			    <button class="btn btn-primary" name="btnEnviar">Enviar</button>
			    <a href="../index.php">regresar</a>
			</form>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>