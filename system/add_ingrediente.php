<?php 
	include('../php/conexion.php');

	$cod = $_POST['codigo'];
	$nom = $_POST['nombre'];
	$pre = $_POST['precio'];
	$dis = $_POST['disponible'];
	$pub = $_POST['publicado'];

	$sql = "SELECT * FROM ingredientes
			WHERE cod_ingr = '".$cod."' AND nom_ingr = '".$nom."';";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta');

	if('1' == mysqli_num_rows($resultado)){
		echo "<script languaje=JavaScript> 
			alert('El ingrediente $nom, ya existe')
			window.location.href='index.php'

		</script>";}
	else{
		$sql_add = "INSERT INTO ingredientes(cod_ingr, nom_ingr, precio_ingr, disp_ingr, public_ingr) 
					VALUES ('$cod', '$nom', '$pre', '$dis', '$pub')";
					
		mysqli_query($conexion, $sql_add) or die('Error en la consulta Nuevo Ingrediente');

		echo "<script languaje=JavaScript> 
				alert('El ingrediente $nom, ha sido ingresada con exito')
				window.location.href='todos_ingrediente.php'
			</script>";
	}

 ?>