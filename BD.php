<?php
/**
 * Leer json de credenciales y conectar a la DB
 */

$credentials = json_decode(file_get_contents(__DIR__."/credentials.json"));
$_sql = $credentials->mysql;
$conexion = mysqli_connect(
	$_sql->host,
	$_sql->user, 
	$_sql->password,
	$_sql->defaultDb,
	$_sql->port
) or die ("No se ha podido conectar al servidor de Base de datos");
