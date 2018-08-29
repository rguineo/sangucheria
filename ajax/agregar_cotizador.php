<?php
require_once ("../php/conexion.php");//Contiene funcion que conecta a la base de datos
//session_start();
$session_id = session_id();


if (isset($_POST['id'])){$id=$_POST['id'];
}
	
if (!empty($id))
{

$sql_eq = "SELECT cod_prod, nom_prod, precio_prod FROM producto WHERE id_prod = $id;";

$consulta=mysqli_query($conexion, $sql_eq) or die('Error consulta producto');

$fila = mysqli_fetch_array($consulta);
$cod_prod = strtoupper($fila[0]);
$nom_prod = strtoupper($fila[1]);
$pre_prod = strtoupper($fila[2]);

$sql_ins = "INSERT INTO tmp_cotizacion(id_prod, cod_prod, nom_prod, precio_prod, session_id) VALUES('$id','$cod_prod','$nom_prod','$pre_prod', '$session_id');";

$insert_tmp=mysqli_query($conexion, $sql_ins) or die('Error en Insertar ProdTemp');
}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
$sql_del = "DELETE FROM tmp_cotizacion WHERE id_prod='".htmlentities($_GET['id'])."'";
$delete=mysqli_query($conexion, $sql_del) or die('Error al eliminar');
}

?>
<div class='col-lg-10 form-group table'>
<table class='table table-hover'>
<hr>
<span class='span_table'> Detalle Venta</span>
	<thead class='tabla_venta'>
		<tr>
			<th scope='col'>ID</th>
			<th scope='col'>Codigo</th>
			<th scope='col'>Producto</th>
			<th scope='col'>Precio</th>
			<th scope='col'>Cantidad</th>
			<th scope='col'>Total</th>
			<th scope='col' style='text-align: center;'>Acciones</th>
		</tr>
	</thead>
	<tbody>

<?php
	$sql = "SELECT * FROM tmp_cotizacion WHERE session_id='$session_id'";
	$resultado=mysqli_query($conexion, $sql) or die('Error en la consulta');
	$total_compra=0;
	while ($row=mysqli_fetch_array($resultado)){
		$id_prod=$row["id_prod"];
		$cod_prod=$row['cod_prod'];
		$nom_prod=strtoupper($row['nom_prod']);
		$precio_prod=strtoupper($row['precio_prod']);
		//$cant_prod=strtoupper($row['can_prod']);
		$cant_prod=1;
		?>
		<tr>
			<td><?php echo $id_prod;?></td>
			<td><?php echo $cod_prod;?></td>
			<td><?php echo $nom_prod;?></td>
			<td><?php echo '$'.$precio_prod; ?></td>
			<td><?php echo $cant_prod; ?></td>
			<?php $total = $precio_prod*$cant_prod; ?>
			<td> <?php echo '$'.$total; ?></td>
			<?php $total_compra=$total_compra+ $total?>
			<td >
				<span class="pull-center"><a href="#" title="Eliminar Producto" onclick="eliminar('<?php echo $id_prod; ?>')"><i class="fa fa-trash fa-2x" style="color: red;"></i></a>
				</span>
				<span class="pull-center"><a href="#" title="Ingredientes" onclick="ingrediente('<?php echo $id_prod; ?>')"><i class="fa fa-info-circle fa-2x" style="color: grey;"></i></a>
				</span>
			</td>
		</tr>		
		<?php
	}

?>
	</tbody>
</table>

<div class='col-lg-10 aderezo'><span><a href="#" class="btn btn-danger" title="Agregar Aderezo"><i class="fa fa-audio-description fa-2x"></i></a></div>
<div class='col-lg-10 total-venta'><span>TOTAL VENTA <?php echo '$'.$total_compra; ?></div>
