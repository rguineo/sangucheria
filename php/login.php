<?php
	session_start();
	include("conexion.php");

	$usuario = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT usr_usuario, lvl_usuario, id_usuario 
			FROM usuarios 
			WHERE usr_usuario = '".$usuario."' and pass_usuario = '".md5($password)."'";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta de Login');;

	if('1' == mysqli_num_rows($resultado)){
		$linea = mysqli_fetch_array($resultado);

		$nombre = $linea[0];
		$privilegio = $linea[1];
		$id_user = $linea[2];

		// mantener los privilegios en la sesion
		$_SESSION["nombre"] = $nombre;
		$_SESSION["privilegio"] = $privilegio;
		$_SESSION['id_user'] = $id_user;


		switch ($privilegio) {
			case '0':
				header("location: ../system/index.php");
				break;
			case '1':
				header("location: ../system/ventas.php");
				break;
		}
	}else{
		
		echo "<script language=JavaScript>
					alert('Usuario o password incorrecta, Intente Nuevamente');
					window.location.href='../index.php';
				</script>";

	}

	mysql_close();

?>