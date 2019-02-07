<!DOCTYPE html> 
<html>
	<head>
		<title>Escuelita Magica</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	</head>

<body>
	 
		<div id="div1" >
		<div id="div2">

			<div id="nav_wrapper">
				<head><h1>Escuela Magica</h1></head>
				<ul>
					<li><a href="#" class="active">Inicio</a></li>
					<li><a href="#">Nuestros Objetivos</a></li>
					<li><a href="#">Encuentranos</a></li>
					<li><a href="">Más</a>

						<ul>
							<li><a href="#" class="active1">Galeria</a></li>
							<li><a href="#">Horarios</a></li>
							<li><a href="#">Iniciar Sesion</a></li>				
						</ul>
					</li>
				</ul>

			</div>

		</div>

<div id="div3"><h1>Bienvenido</h1>
	<h1>Escuelita Magica</h1><p>Por Excelencia Academica</p>
	<p>Valor y Responsabilidad Social</p>

	<form action="insertar.php" method="POST" name="form">
		<input type="text" name="ID"><br/>
		<input type="text" name="MARCA"><br/>
		<input type="text" name="PRECIO"><br/>
		<input type="submit" value="insertar datos" class="" name="btn1">
		<input type="submit" value="consultar" class="" name="btn2">
		<input type="submit" value="actualizar" class="" name="btn3">
		<input type="submit" value="eliminar" class="" name="btn4">
	</form>

	


	<?php
		/* Conexion pruebas inicio php*/

		$usuario = "Alonso";
 		$contrasena = "Resident";  
 		$servidor = "localhost";
		$basededatos = "Productos";
		

		$conexion = mysqli_connect( $servidor, $usuario, "Resident")or die ("No se ha podido conectar al servidor de Base de datos");
 
 		$db = mysqli_select_db( $conexion, $basededatos )  or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

		
		mysqli_close( $conexion );
	?>	
	</div>
 */
</div>

	

	</div>
</body>
</html>