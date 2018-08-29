<?php 
	include ('../php/conexion.php');
	include_once ('funciones.php');
	// Recoger los datos del detalle

	$id_ade = $_POST['id_ade'];

	$sql = "DELETE FROM aderezo_tmp WHERE id_ade = '".$id_ade."'";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta de Eliminar Aderezo Temp');

	coloca_ade();

 ?>