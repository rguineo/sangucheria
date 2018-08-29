<?php 
	include('../php/conexion.php');

	$cod = $_POST['codigo'];
	$nom = $_POST['nombre'];
	$pre = $_POST['precio'];
	$dis = $_POST['disponible'];
	$pub = $_POST['publicado'];

	$sql = "SELECT * FROM aderezo
			WHERE cod_aderezo = '".$cod."' AND nom_aderezo = '".$nom."';";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta');

	if('1' == mysqli_num_rows($resultado)){
		echo "<script languaje=JavaScript> 
			alert('El aderezo $nom, ya existe')
			window.location.href='index.php'

		</script>";}
	else{
		$sql_add = "INSERT INTO aderezo(cod_aderezo, nom_aderezo, precio_aderezo, disp_aderezo, public_aderezo) 
					VALUES ('$cod', '$nom', '$pre', '$dis', '$pub')";
					
		mysqli_query($conexion, $sql_add) or die('Error en la consulta');

		echo "<script languaje=JavaScript> 
				alert('El aderezo $nom, ha sido ingresada con exito')
				window.location.href='todos_aderezo.php'
			</script>";
	}

 ?>