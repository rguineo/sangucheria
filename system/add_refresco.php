<?php 
	include('../php/conexion.php');

	$cod = $_POST['codigo'];
	$nom = $_POST['nombre'];
	$pre = $_POST['precio'];
	$dis = $_POST['disponible'];
	$pub = $_POST['publicado'];

	$sql = "SELECT * FROM refresco
			WHERE cod_ref = '".$cod."' AND nom_ref = '".$nom."';";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta');

	if('1' == mysqli_num_rows($resultado)){
		echo "<script languaje=JavaScript> 
			alert('El refresco $nom, ya existe')
			window.location.href='index.php'

		</script>";}
	else{
		$sql_add = "INSERT INTO refresco(cod_ref, nom_ref, precio_ref, disp_ref, public_ref) 
					VALUES ('$cod', '$nom', '$pre', '$dis', '$pub')";
					
		mysqli_query($conexion, $sql_add) or die('Error en la consulta');

		echo "<script languaje=JavaScript> 
				alert('El refresco $nom, ha sido ingresado con exito')
				window.location.href='todos_refresco.php'
			</script>";
	}

 ?>