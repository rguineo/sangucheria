<?php  

	include ('../php/conexion.php');

	$prod = $_POST['prod'];

	$sql = "SELECT obs_prod FROM temp WHERE id_prod = '$prod'";
	$res = mysqli_query($conexion, $sql) or die('Error consulta OBS');
	$observa = mysqli_fetch_array($res);

	$obs = "<p>Este Producto tiene observación:</p>";
	$obs .= "<p style='font-weight: bold; text-align: center;'>".strtoupper($observa[0])."</p>";

	return printf($obs);
?>	