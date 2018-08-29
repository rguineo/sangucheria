<?php 
	include('../php/conexion.php');
	include('vistas.php');

	$id_prod = $_POST['id_prod'];
	$cod_prod = $_POST['codigo'];
	$nom_prod = $_POST['nombre'];
	$des_prod = $_POST['descripcion'];
	$pre_prod = $_POST['precio'];
	$dis_prod = $_POST['disponible'];
	$dto_prod = $_POST['descuento'];
	$pbl_prod = $_POST['publicado'];

	$sql = "UPDATE producto 
			SET cod_prod = '$cod_prod',
				nom_prod = '$nom_prod',
				desc_prod = '$des_prod',
				precio_prod = '$pre_prod',
				dcto_prod = '$dto_prod',
				disp_prod = '$dis_prod',
				public_prod = '$pbl_prod'
			WHERE id_prod = $id_prod";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Actualizar Producto');
	
	echo "<script> 
				alert('El Sandwich $nom_prod, ha sido actualizado con exito')
				window.location.href='todos_producto.php'
			</script>";
?>
 ?>