<?php
include ("BD.php");
 if(isset($_POST['ID']) && !empty($_POST['ID']) &&
 	isset($_POST['MARCA']) && !empty($_POST['MARCA']) &&
 	isset($_POST['PRECIO']) && !empty($_POST['PRECIO']))
		
	{


		$conexion = mysqli_connect( $servidor, $usuario, $contrasena, $basededatos)or die ("No se ha podido conectar al servidor de Base de datos");


		$query ="INSERT INTO Productos (ID,Marca,Precio) VALUES('$_POST[ID]','$_POST[MARCA]','$_POST[PRECIO]')";
 		
 		mysqli_query($conexion,$query) or die ("Problema conectando a la base de datos");
			echo "Datos insertados";
	}else{

			echo "problemas en la conexion";

		}
	

	?>	