<?php 
	include('../php/conexion.php');
	include('funciones.php');

	$id = $_POST['id'];
	$ref = $_POST['ref'];
	$cos = $_POST['cos'];
	$can = $_POST['can'];

	$sql = "INSERT INTO refresco_tmp(id_ref, nom_ref, cos_ref, can_ref) 
			VALUES ('$id', '$ref', '$cos', '$can')";
	$result = mysqli_query($conexion, $sql) or die ('Error Ingresar Refresco');
	coloca_ref();
 ?>