<?php 
	include ('../php/conexion.php');
	include_once ('funciones.php');
	// Recoger los datos del detalle

	$id_ref = $_POST['id_ref'];

	$sql = "DELETE FROM refresco_tmp WHERE id_ref = '".$id_ref."'";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta de Eliminar Aderezo Temp');

	coloca_ref();

 ?>