<?php
	include("BD.php");
	
	if(isset($_POST['id']) && !empty($_POST['id']) &&
		isset($_POST['marca']) && !empty($_POST['marca']) &&
		isset($_POST['precio']) && !empty($_POST['precio']) &&
		isset($_POST['unidades']) && !empty($_POST['unidades']) )

	{

		// Create
		if (isset($_POST['create'])) {
			// importante: convertir a entero con (int), previene sql injection
			$id = (int)$_POST['id'];
			$marca = $_POST['marca'];
			$precio = $_POST['precio'];
			$unidades = $_POST['unidades'];

			if ($id=="" || $marca=="" || $precio=="" || $unidades=="") {
				echo "Llene todos los espacios";
			} else {
				if (!mysqli_query($conexion, "INSERT INTO productos (id, marca, precio, unidades) values ('$id', '$marca', '$precio', '$unidades')")) {
					echo("Hubo un error: ".mysqli_error($conexion));
				} else {
					echo "Se ha agredado correctamente el registro";
				}
			}
		}

		// Read
		if (isset($_POST['read'])) {
			// importante: convertir a entero con (int), previene sql injection
			$id = (int)$_POST['id'];
			$marca = $_POST['marca'];
			$precio = $_POST['precio'];
			$unidades = $_POST['unidades'];

			if ($id=="") {
				echo "Se debe de colocar el ID";
			} else {
				$resultados = mysqli_query($conexion, "SELECT * FROM productos WHERE id = ".$id);

				while ($consulta = mysqli_fetch_array($resultados)) {
					echo $consulta['id']."<br>";
					echo $consulta['marca']."<br>";
					echo $consulta['precio']."<br>";
					echo $consulta['unidades']."<br>";
				}
			}
		}

		// Update
		if (isset($_POST['update'])) {
			// importante: convertir a entero con (int), previene sql injection
			$id = (int)$_POST['id'];
			$marca = $_POST['marca'];
			$precio = $_POST['precio'];
			$unidades = $_POST['unidades'];
			if ($id=="" || $marca=="" || $precio=="" || $unidades=="") {
				echo "Llene todos los espacios";
			} else {
				if (!mysqli_query($conexion, "UPDATE productos SET marca='$marca', precio='$precio', unidades='$unidades' WHERE id='$id'")) {
					echo "Error: ".mysqli_error($conexion);
				} else {
					echo "Se ha Actualizado correctamente";
				} 
			}
		}

		if (isset($_POST['delete'])) {
			$id = (int)$_POST['id'];
			if ($id=="") {
				echo "El campo ID es obligatorio";
			} else {
				if (!mysqli_query($conexion, "DELETE FROM productos WHERE id = '$id'")) {
					echo "Error: ".mysqli_error($conexion);
				} else {
					echo "Se ha eliminado el registro";
				}
			}
		}
	}




?>