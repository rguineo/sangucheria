<?php 
	include ('../php/conexion.php');
	include_once ('funciones.php');
	// Recoger los datos del detalle

	$id_prod = $_POST['prod'];

	$sql = "DELETE FROM temp WHERE id_prod = '".$id_prod."'";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta de Eliminar Prod Temp');

	carga_detalle();

 ?>