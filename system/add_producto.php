<?php 
	include('../php/conexion.php');

	$cod = $_POST['codigo'];
	$nom = $_POST['nombre'];
	$des = $_POST['descripcion'];
	$pre = $_POST['precio'];
	$dsc = $_POST['descuento'];
	$pub = $_POST['publicado'];
	$dis = $_POST['disponible'];

	$sql = "SELECT * FROM producto
			WHERE cod_prod = '".$cod."' AND nom_prod = '".$nom."';";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Sandwich');

	if('1' == mysqli_num_rows($resultado)){
		echo "<script languaje=JavaScript> 
			alert('El Sandwich $nom, ya existe')
			window.location.href='index.php'

		</script>";}
	else{
		$sql_add = "INSERT INTO producto(cod_prod, nom_prod, desc_prod, precio_prod, dcto_prod, disp_prod, public_prod) 
					VALUES ('$cod', '$nom', '$des', '$pre', '$dsc', '$dis', '$pub')";
		
		mysqli_query($conexion, $sql_add) or die('Error en la consulta Agregar Sandwich');

		echo "<script languaje=JavaScript> 
				alert('El Sandwich $nom, ha sido ingresado con exito')
				window.location.href='todos_producto.php'
			</script>";
	}

 ?>