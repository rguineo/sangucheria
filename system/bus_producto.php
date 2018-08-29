<?php
	require_once ("../php/conexion.php");//Contiene funcion que conecta a la base de datos

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($conexion,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('id_prod', 'cod_prod', 'nom_prod', 'precio_prod');
		 //Columnas de busqueda
		 $sTable = "producto";
		 $sWhere = "WHERE producto.disp_prod = '1'";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE producto.disp_prod = '1' and ( ";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		include '../ajax/pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/

		$sql_eq = "SELECT count(*) AS numrows FROM $sTable $sWhere";
		
		$count_query   = mysqli_query($conexion, $sql_eq);
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './index.php';
		//main query to fetch the data
		$sql="SELECT * FROM $sTable $sWhere LIMIT $offset,$per_page";

		$query = mysqli_query($conexion, $sql) or die('Error Busqueda Producto');
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning tabla-venta">
					<th>ID</th>
					<th>Código</th>
					<th>Producto</th>
					<th>Precio</th>
					<th>Precio</th>
					<th style="width: 36px;">Agregar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$id_prod=$row['id_prod'];
					$cod_prod=$row['cod_prod'];
					$nombre_prod=$row['nom_prod'];
					$precio_prod=$row['precio_prod'];

					?>
					<tr>
						<td><?php echo $id_prod; ?></td>
						<td><?php echo strtoupper($cod_prod); ?></td>
						<td ><?php echo strtoupper($nombre_prod); ?></td>
						<td><?php echo '$'.strtoupper($precio_prod); ?></td>
						<td><input type="number" name="cant" id="cant" placeholder="cant" class="form-control" size="5"></td>
	
						<td ><span class="pull-center"><a href="#" onclick="agregar('<?php echo $id_prod; ?>')" title='<?php echo $id_prod; ?>'><i class="fa fa-plus-circle fa-2x venta" ></i></a></span></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>

			<?php
			mysqli_close($conexion);
		}
	}
?>
