<?php
include("BD.php");

function vaildarDatos () {
	$datos = new StdClass();
	$datos->id = isset($_POST['id']) ? (int)$_POST['id'] : '';
	$datos->marca = isset($_POST['marca']) ? $_POST['marca'] : '';
	$datos->precio = isset($_POST['precio']) ? $_POST['precio'] : '';
	$datos->unidades = isset($_POST['unidades']) ? $_POST['unidades'] : '';

	return $datos;
};

$datos = vaildarDatos();

$create = function () use ($conexion, $datos) {
	if ($datos->marca == "" || $datos->precio == "" || $datos->unidades == "") {
		return "Llene todos los campos";
	}

	if (!mysqli_query($conexion, "INSERT INTO productos (marca, precio, unidades) values ('$datos->marca', '$datos->precio', '$datos->unidades')")) {
		return "Hubo un error: ".mysqli_error($conexion);
	}

	return "Se ha agredado correctamente el registro";
};

$read = function () use ($conexion, $datos) {
	if ($datos->id <= 0) {
		return "Se requiere el ID";
	}

	$resultado = mysqli_query($conexion, "SELECT * FROM productos WHERE ID = ".$datos->id);
	if (!$resultado) {
		return "Error: ".mysqli_error($conexion);
	}
	$registro = mysqli_fetch_assoc($resultado);

	return $registro;
};

$update = function () use ($conexion, $datos) {
	if ($datos->id <= 0 || $datos->marca == "" || $datos->precio == "" || $datos->unidades == "") {
		return "Llene todos los campos";
	}

	if (!mysqli_query($conexion, "UPDATE productos SET marca='$datos->marca', precio='$datos->precio', unidades='$datos->unidades' WHERE ID='$datos->id'")) {
		return "Error: ".mysqli_error($conexion);
	} 
	
	return "Se ha Actualizado correctamente";
};

$delete = function () use ($conexion, $datos) {
	if ($datos->id <= 0) {
		return "Se requiere el ID";
	}

	if (!mysqli_query($conexion, "DELETE FROM productos WHERE ID = '$datos->id'")) {
		return "Error: ".mysqli_error($conexion);
	}
	
	return "Se ha eliminado el registro";
};

$all = function () use ($conexion) {
	$consulta = mysqli_query($conexion, "SELECT * FROM productos ORDER BY ID");
	if (!$consulta) {
		return "Error: ".mysqli_error($conexion);
	}

	$registros = array();

	while($resultado = mysqli_fetch_assoc($consulta)) {
		$registros[] = $resultado;
	}
	return $registros; 
};

switch ($_REQUEST['action']) {
	case 'Registrar':
		$respuesta = $create();
		break;
	case 'Actualizar':
		$respuesta = $update();
		break;
	case 'Consultar':
		$respuesta = $read();
		break;
	case 'Eliminar':
		$respuesta = $delete();
		break;
	case 'all':
		$respuesta = $all();
		break;
	default:
		$respuesta = '';
		break;
}	
?>
