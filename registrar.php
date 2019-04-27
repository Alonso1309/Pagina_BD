<?php
error_reporting(E_ALL & ~E_NOTICE);
include("classes/Crear.php");
$proceso = new Proceso(__DIR__);
$respuesta = $proceso->parseRequest();
?>
<!DOCTYPE html> 
<html>
	<head>
		<title>Registro</title>
	</head>
		<center>
			<body>
				<form method="POST" action="<?=$_SERVER['PHP_SELF']?>?action=submit">
												
								<div class="form-group">
									<label for="usuario" class="col-md-3 control-label">Usuario</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="usuario" placeholder="Usuario" >
									</div>
								</div>
								
								<div class="form-group">
									<label for="password" class="col-md-3 control-label">Password</label>
									<div class="col-md-9">
										<input type="password" class="form-control" name="password" placeholder="Password" >
									</div>
								</div>
								
								<div class="form-group">
									<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
									<div class="col-md-9">
										<input type="password" class="form-control" name="Con_password" placeholder="Confirmar Password" >
									</div>
								</div>
								
								<br>
									<input type="submit" value="Registrar" name="action">
				</form>
			</body>
		</center>>
</html>													