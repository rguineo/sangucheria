<?php 
	include('../php/conexion.php');
	include('vistas.php');

	$id_aderezo = $_POST['id_aderezo'];
	$cod_aderezo = $_POST['codigo'];
	$nom_aderezo = $_POST['nombre'];
	$pre_aderezo = $_POST['precio'];
	$dis_aderezo = $_POST['disponible'];
	$pbl_aderezo = $_POST['publicado'];

	$sql = "UPDATE aderezo
			SET cod_aderezo = '$cod_aderezo',
				nom_aderezo = '$nom_aderezo',
				precio_aderezo = '$pre_aderezo',
				disp_aderezo = '$dis_aderezo',
				public_aderezo = '$pbl_aderezo'
			WHERE id_aderezo = $id_aderezo";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Actualizar aderezoediente');
	
	echo "<script> 
				alert('El Aderezo $nom_aderezo, ha sido actualizado con exito')
				window.location.href='todos_aderezo.php'
			</script>";
?>
 ?>