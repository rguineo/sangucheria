<?php 
	include('../php/conexion.php');
	include('funciones.php');

	$id = $_POST['id'];
	$ade = $_POST['ade'];
	$cos = $_POST['cos'];
	$can = $_POST['can'];

	$sql = "INSERT INTO aderezo_tmp(id_ade, nom_ade, cos_ade, can_ade) 
			VALUES ('$id', '$ade', '$cos', '$can')";
	$result = mysqli_query($conexion, $sql) or die ('Error Ingresar Aderezo');
	coloca_ade();
 ?>