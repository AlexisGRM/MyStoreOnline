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
		$sql = "SELECT * FROM personas
		WHERE CONCAT(nombre,apellidoPaterno,apellidoMaterno) LIKE '%$busqueda%'";
		$result = $conn->query($sql);

	}else{

		$sql = "SELECT * FROM personas";
		$result = $conn->query($sql);
	}


	$conn->close();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de personas</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/css/font-awesome.min.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/estiloDePersonas.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/imagen.css">
	
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">My Store Online</a>
      <ul class="nav navbar-nav">
      <li class=""><a href="../admi/index.php">Home</a></li>
      <li><a href="../admi/personas.php">Personas</a></li>
      <li><a href="../admi/articulos.php">Articulos</a></li>
      <li><a href="../admi/Ventas.php">VENTAS</a></li>
      
    </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  
</div>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Personas</strong>
		</div>
		<form method="POST" class="form-horizontal" role="form" style="margin-top:20px;">
							<div class="form-group col-md-11" style="margin-left: 15px;">
							      <label class="control-label col-sm-1" for="email"></label>
							      <div class="col-sm-11">
							        <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar Persona">
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
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Domicilio</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {?>
			    <tr>
			    	<td><?php echo $row["personaID"]?></td>
			    	<td><?php echo $row["nombre"]?></td>
			    	<td><?php echo $row["apellidoPaterno"]?></td>
			    	<td><?php echo $row["apellidoMaterno"]?></td>
			    	<td><?php echo $row["domicilio"]?></td>
			    	<td><?php echo $row["telefono"]?></td>
			    	<td><?php echo $row["correo"]?></td>
			    	<td>
			    		<a href="../personas/borrarPersona.php?personaID=<?php echo $row['personaID'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
			    		<a href="../personas/ModificarPersona.php?personaID=<?php echo $row['personaID'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
			    	
			    		
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
			<a href="../personas/registraPersonas.php">Nueva Persona</a>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>

