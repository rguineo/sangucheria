<?php 
	include('../php/conexion.php');

	$sql = "TRUNCATE TABLE temp;";
	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta de Eliminar Prod Temp');

	$sql1 = "TRUNCATE TABLE aderezo_tmp;";
	$resultado1 = mysqli_query($conexion, $sql1) or die('Error en la consulta de Eliminar Aderezo Temp');

	$sql2 = "TRUNCATE TABLE refresco_tmp;";
	$resultado2 = mysqli_query($conexion, $sql2) or die('Error en la consulta de Eliminar Refresco Temp');
	$resp = "ok";

	echo $resp;

?>