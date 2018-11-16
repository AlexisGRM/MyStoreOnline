<?php 
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

	if(isset($_POST["btnLogin"])){
		$username = $_POST["username"];
		$password = $_POST["password"];

		$sql="SELECT * FROM personas WHERE username='$username' AND password='$password'";

		$result = $conn->query($sql);
		if($result->num_rows>0){

		header("location:/Ejercicio6/sesion/sesionDePersonas.php");
	}else{
		$mensaje_error = "datos incoirrectos";
	}
	}

	
	


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 	 <link rel="stylesheet" type="text/css" href="../Styles6/imagen.css">
	 <link rel="stylesheet" type="text/css" href="../Styles6/estiloDePersonas.css">
 </head>
 <body>
<!------------------------------------------------------------------------------------------------>		
	<nav class="navbar navbar-inverse" style="font-size: 21px;margin-bottom: 40px ">
  		<div class="container-fluid">

    	<ul class="nav navbar-nav">
      		<li class="active"><a href="../index.php">My Store Online</a></li>
      		<li><a href=""></a></li>
    	</ul>

  		</div>
	</nav>
<!------------------------------------------------------------------------------------------------>
 	<div class="container">
  		<div class="panel panel-primary">
    		<div class="panel-heading">
      			<strong>login</strong>
    		</div>

    		<div class="panel-body"> 		
 			<form method="POST" class="form-horizontal" role="form">		
	 			<div class="form-group">
			      <label class="control-label col-sm-1" for="username">Usuario:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" required>
			      </div>
			    </div>

			    <div class="form-group">
			      <label class="control-label col-sm-1" for="password">Contraseña:</label>
			      <div class="col-sm-11">
			        <input type="password" class="form-control" id="password" name="password" required>
			      </div>
			    </div>
			<input type="submit" class="btn btn-success" name="btnLogin" value="entrar">
 			</form>
 			
 			</div><!-- Cierre de panel body -->
  		</div><!-- Cierre de panel primary -->
  	</div><!-- Cierre de container -->
	<!------------------------------------------------------------------------------------------------>
	<?php 

		if(isset($mensaje_error))
			echo '<p class="alert alert-warning">'.$mensaje_error.'</p>';

	 ?>

 </body>
 </html>