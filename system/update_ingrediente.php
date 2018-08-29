<?php 
	include('../php/conexion.php');
	include('vistas.php');

	$id_ingr = $_POST['id_ingr'];
	$cod_ingr = $_POST['codigo'];
	$nom_ingr = $_POST['nombre'];
	$pre_ingr = $_POST['precio'];
	$dis_ingr = $_POST['disponible'];
	$pbl_ingr = $_POST['publicado'];

	$sql = "UPDATE ingredientes 
			SET cod_ingr = '$cod_ingr',
				nom_ingr = '$nom_ingr',
				precio_ingr = '$pre_ingr',
				disp_ingr = '$dis_ingr',
				public_ingr = '$pbl_ingr'
			WHERE id_ingr = $id_ingr";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Actualizar Ingrediente');
	
	echo "<script> 
				alert('El Ingrediente $nom_ingr, ha sido actualizado con exito')
				window.location.href='todos_ingrediente.php'
			</script>";
?>
 ?>