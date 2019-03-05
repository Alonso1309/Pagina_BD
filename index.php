<?php
error_reporting(E_ALL & ~E_NOTICE);
include("procesos.php");
?>
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
			<center><h1>PROPIETARIO, usando versión <?=phpversion()?> de PHP</h1></center>
			<a href="<?=$_SERVER['PHP_SELF']?>?action=all">Ver todos</a>
			<form method="POST" action="<?=$_SERVER['PHP_SELF']?>?action=submit">
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
					<input type="submit" value="Registrar" class="btn btn-success" name="action">
					<input type="submit" value="Consultar" class="btn btn-primary" name="action">
					<input type="submit" value="Actualizar" class="btn btn-info" name="action">
					<input type="submit" value="Eliminar" class="btn btn-danger" name="action">
				</center>
			</form>
			<? if (is_string($respuesta)) {?>
				<h3><?=$respuesta?></h3>
			<? }?>
			<? if (is_array($respuesta)&& $_POST['action'] == 'Consultar') {?>
				<ul>
					<? foreach ($respuesta as $campo => $valor) {?>
						<li><?=$campo?>: <?=$valor?></li>
					<? }?>
				</ul>
			<? }?>
			<? if (is_array($respuesta) && $_GET['action'] == 'all') {?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>id</th>
							<th>marca</th>
							<th>precio</th>
							<th>unidades</th>
						</tr>
					</thead>
					<tbody>
						<? foreach ($respuesta as $registro) {?>
							<tr>
								<? foreach ($registro as $valor) {?> 
									<td><?=$valor?></td>
								<? }?>
							</tr>
						<? }?>
					</tbody>
				</table>
			<? }?>
			</div>
		</div>
	</body>
</html>
<? // cerrar conexion
if ($_GET['action'] == 'submit') {
	mysqli_close($conexion);
}?>
