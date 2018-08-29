<?php 
	include('../php/conexion.php');

	$nom = $_POST['nom'];
	$ape = $_POST['ape'];
	$eml = $_POST['usr'];
	$pas = $_POST['pass'];
	$lvl = $_POST['rol'];

	$sql = "SELECT * FROM usuarios WHERE usr_usuario = '".$eml."' AND pass_usuario = '".$pas."';";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta');

	if('1' == mysqli_num_rows($resultado)){
	echo "<script languaje=JavaScript> 
			alert('El Usuario $nom $ape, ya existe')
			window.location.href='todos_usuarios.php'

		</script>";}
	else{
		$sql_add = "INSERT INTO usuarios(usr_usuario, pass_usuario, nom_usuario, ape_usuario, lvl_usuario) 
					VALUES ('$eml', md5('$pas'), '$nom', '$ape', '$lvl')";
		mysqli_query($conexion, $sql_add) or die('Error en la consulta');

		echo "<script languaje=JavaScript> 
				alert('El Usuario $nom $ape, ha sido ingresado con exito')
				window.location.href='todos_usuarios.php'
			</script>";
	}

 ?>