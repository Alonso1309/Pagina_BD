<?php
		$usuario = "Alonso";
 		$contrasena = "Resident";  
 		$servidor = "localhost";
		$basededatos = "Productos";

		$conexion = mysqli_connect( $servidor, $usuario, $contrasena, $basededatos)or die ("No se ha podido conectar al servidor de Base de datos");
?>