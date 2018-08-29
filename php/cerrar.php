<?php 
	include('seguridad.php');
	include('conexion.php');
	mysqli_close($conexion);
	session_destroy();
	header("Location: ../");
?>