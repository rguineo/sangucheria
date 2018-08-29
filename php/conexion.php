<?php
	
	$conexion = mysqli_connect("localhost", "root", "", "base_ajo");

	if (mysqli_connect_errno())
	  {
	  echo "Falla al conectar a MySQL: " . mysqli_connect_error();
	  }
	mysqli_set_charset($conexion, "utf8");
?>