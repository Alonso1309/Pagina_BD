<!DOCTYPE html> 
<html>
	<head>
		<title>Escuelita Magica</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	</head>
	<body>
		<div id="div1">
			<div id="div2">
				<div id="nav_wrapper">
					<h1>Escuela Magica</h1>
					<ul>
						<li><a href="#" class="active">Inicio</a></li>
						<li><a href="#">Nuestros Objetivos</a></li>
						<li><a href="#">Encuentranos</a></li>
						<li><a href="">Más</a>
						<ul>
							<li><a href="#" class="active1">Galeria</a></li>
							<li><a href="#">Horarios</a></li>
							<li><a href="login.php">Iniciar Sesion</a></li>				
						</ul>
						</li>
					</ul>
				</div>
			</div>
		
		<div class="col-md-4">
		<center><h1>PROPIETARIO</h1></center>

		<form method="POST" action="index.php?action=submit">
			<div class="form-group">
				<label for="ID">ID</label>
				<input type="text" name="id" class="form-control" id="id">
			</div>
			<br>
			<div class="form-group">
				<label for="marca">Marca</label>
				<input type="text" name="marca" class="form-control" id="marca" >
			</div>
			<br>
			<div class="form-group">
				<label for="precio">Precio</label>
				<input type="text" name="precio" class="form-control" id="precio">
			</div>
			<br>
				<div class="form-group">
				<label for="unidades">Unidades</label>
				<input type="text" name="unidades" class="form-control" id="unidades">
			</div>
			<br>
			<center>
				<input type="submit" value="Registrar" class="btn btn-success" name="create">
				<input type="submit" value="Consultar" class="btn btn-primary" name="read">
				<input type="submit" value="Actualizar" class="btn btn-info" name="update">
				<input type="submit" value="Eliminar" class="btn btn-danger" name="delete">
			</center>

		</form>
		<?php
		error_reporting(E_ALL);

		include("BD.php");
		
		/**
		 * CRUD (Create, Read, Update, Delete)
		 */
			//Desde aqui se movieron los procesos a procesos.php
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

		// cerrar conexion
		if ($_GET['action'] == 'submit') {
			mysqli_close($conexion);
		}else{echo "Error al cerrar la conexion";}
		?>
			</div>
		</div>
	</body>
</html>