<?php
error_reporting(E_ALL & ~E_NOTICE);
// include("procesos.php");
include("classes/Crear.php");

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
									<input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="Con_password" placeholder="Confirmar Password" required>
								</div>
							</div>
							
							<br>
							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" value="create" name="action"><i class="icon-hand-right"></i>Registrar</button> 
								</div>
							</div>
			</form>
			</body>
		</center>>
</html>													