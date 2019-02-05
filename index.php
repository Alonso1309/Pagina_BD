<!DOCTYPE html> 
<html>
	<head>
		<title>Escuelita Magica</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

<body>
	 
	<?php
		/* Conexion pruebas inicio php*/

		$usuario = "Alonso";
 		$contrasena = "Resident";  
 		$servidor = "localhost";
		$basededatos = "Productos";
		$conexion = mysqli_connect( $servidor, $usuario, "Resident"); 

		/* Conexion prueba final*/	

	?>

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
</div>

	</div>
</body>
</html>