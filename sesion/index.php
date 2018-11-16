<?php 
	//Código para conectar
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "sesion";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	$conn->set_charset("utf8");

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	if(isset($_POST["btnRegistrar"])){
		$nombre = $_POST["nombre"];
		$contraseña = $_POST["contraseña"];
		
		

		//Codigo para ejecutar query
		$sql = "INSERT INTO usuario(nombre, contraseña)value('$nombre','$contraseña')";
		$result = $conn->query($sql);

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /sesion3/index.php");
		}
	}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 </head>
 <body>
 <form method="POST" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="control-label col-sm-2" for="nombre">Nombre:</label>
			<div class="col-sm-11">
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
			</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="Contraseña">contraseña:</label>
			<div class="col-sm-11">
			   	<input type="password" class="form-control" id="Contraseña" name="contraseña" placeholder="" required>
			</div>
	</div>

<button name="btnRegistrar">Registrar</button>
<a href="inicioSesion.php">Iniciar Sesion</a>
</form>

 	
 </body>
 </html>