<?php
	session_start();
	$privilegio = $_SESSION["privilegio"];
	$nombre = $_SESSION["nombre"];
	$id_user = $_SESSION['id_user'];

	if(empty($nombre)) {
		header("location: ../index.php");
	}
?>