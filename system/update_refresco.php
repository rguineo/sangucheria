<?php 
	include('../php/conexion.php');
	include('vistas.php');

	$id_ref = $_POST['id_ref'];
	$cod_ref = $_POST['codigo'];
	$nom_ref = $_POST['nombre'];
	$pre_ref = $_POST['precio'];
	$dis_ref = $_POST['disponible'];
	$pbl_ref = $_POST['publicado'];

	$sql = "UPDATE refresco
			SET cod_ref = '$cod_ref',
				nom_ref = '$nom_ref',
				precio_ref = '$pre_ref',
				disp_ref = '$dis_ref',
				public_ref = '$pbl_ref'
			WHERE id_ref = $id_ref";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Actualizar Refresco');
	
	echo "<script> 
				alert('El Refresco $nom_ref, ha sido actualizado con exito')
				window.location.href='todos_refresco.php'
			</script>";
?>
 ?>