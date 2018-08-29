<?php 
	include ('../php/conexion.php');
	include_once ('funciones.php');

	// Recoger los datos del detalle

	$id_prod = $_POST['bproducto'];
	$can_prod = $_POST['cantidad'];
	$obs_prod = $_POST['observacion'];
	$uni_prod = $_POST['res_total'];
	$val_prod = $_POST['tot_ing'];
	$ext_prod = $_POST['txtarea_ing'];
	$tot_prod = $_POST['tot_gral'];



	$sql = "INSERT INTO temp (id_prod, cant_prod, obs_prod, uni_prod, val_ing_prod, ing_ext_prod, tot_prod) 
			VALUES('$id_prod', '$can_prod', '$obs_prod', '$uni_prod', '$val_prod', '$ext_prod', '$tot_prod')";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta de Ingresar Prod Temp');

	carga_detalle();
 ?>