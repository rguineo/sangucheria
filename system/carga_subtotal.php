<?php  
include ('../php/conexion.php');

$id_prod = $_POST['prod'];

$sql = "SELECT precio_prod 
		FROM producto 
		WHERE id_prod = '".$id_prod."'";

$resultado = mysqli_query($conexion, $sql) or die ('Error en la consulta');
	while ($row=mysqli_fetch_array($resultado)){
		$subtotal = "<input type='number' value='".$row[0]."' class='res_total' name='res_total' id='res_total' readonly>";
	}

return printf($subtotal);

?>