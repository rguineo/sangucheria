<?php
// Variables Globales
$total_pedido = 0;

function carga_detalle()
{
	include ('../php/conexion.php');

	// VARIABLE TOTAL 
	global $total_pedido;

	$sql_cons ="SELECT temp.id_prod, producto.nom_prod, temp.cant_prod, temp.uni_prod, temp.ing_ext_prod,  temp.val_ing_prod, temp.tot_prod, temp.obs_prod
				FROM temp
				INNER JOIN producto
				ON producto.id_prod = temp.id_prod";
	$resul_cons = mysqli_query($conexion, $sql_cons) or die('Error en la consulta de Prod Temp');

	$tabla_productos = "<table class='table table-striped table-bordered table-hover tabla-usuarios' id='dataTables-example'>";

	        $tabla_productos .= "<thead style='text-align: center; background: #eaeaea;'>";
	            $tabla_productos .= "<tr>";
	                $tabla_productos .= "<th style='text-align: center;'> Producto</th>";
	                $tabla_productos .= "<th style='text-align: center;'> Cantidad</th>";
	                $tabla_productos .= "<th style='text-align: center;'> $ Unitario</th>";
	                $tabla_productos .= "<th style='text-align: center;'> Ingredientes (extra) </th>";
	                $tabla_productos .= "<th style='text-align: center;'> $ Ing.</th>";
	                $tabla_productos .= "<th style='text-align: center;'> $ Total</th>";
	                $tabla_productos .= "<th style='text-align: center;'> Eliminar</th>";
	                $tabla_productos .= "<th style='text-align: center;'> Info</th>";

	            $tabla_productos .= "</tr>";
	        $tabla_productos .= "</thead>";
	        $tabla_productos .= "<tbody>";
	while ($fila = mysqli_fetch_array($resul_cons)){
		 $tabla_productos .= "<tr>";
		 	$tabla_productos .= "<td>".strtoupper($fila[1])."</td>";
		 	$tabla_productos .= "<td>".$fila[2]."</td>";
		 	$tabla_productos .= "<td>$ ".$fila[3]."</td>";
		 	$tabla_productos .= "<td>".$fila[4]."</td>";
		 	$tabla_productos .= "<td>$ ".$fila[5]."</td>";
		 	$tabla_productos .= "<td>$ ".$fila[6]."</td>";
		 	$tabla_productos .= "<td><a onClick='elimina_prod($fila[0])' title='Eliminar Producto'><i class='fa fa-trash fa-2x'></i></a></td>";
		 	if ($fila[7] != ""){
				$tabla_productos .= "<td><a onClick='verObsPro($fila[0])' title='Observacion Producto'><i class='fa fa-info fa-2x' style='color:red;'></i></a>";
			}else{
				$tabla_productos .= "<td></td>";
			}
			$tabla_productos .= "</td>";

		 	$total_pedido = $total_pedido + $fila[6];
		 $tabla_productos .= "</tr>";
	}
		$tabla_productos .= "</tbody>";
	$tabla_productos .= "</table>";
	$tabla_productos .= "<hr class='venta'>";
	$tabla_productos .= "<div class='form-goup'>";
		$tabla_productos .= "<label class='total_pedido' for='total_pedido'> Total Productos";
		$tabla_productos .= "<br>";
		$tabla_productos .= "<input value='$ ".$total_pedido."' class='total_pedido' name='total_pedido' id='total_pedido' onchange='toGral()' readonly>";
	$tabla_productos .= "</div>";

	return printf($tabla_productos);
}

function carga_aderezos(){
	include ('../php/conexion.php');

	$sql = "SELECT * FROM aderezo WHERE disp_aderezo = '1' AND public_aderezo = '1'";
	$res = mysqli_query($conexion, $sql) or die('Error consulta Aderezos');

	$aderezos = "<table class='table table-hover'>";

			$aderezos .= "<thead>";
				$aderezos .= "<th>ID</th>";
				$aderezos .= "<th>Aderezo</th>";
				$aderezos .= "<th>Precio ($)</th>";
				$aderezos .= "<th>Cantidad</th>";
			$aderezos .= "</thead>";

			$aderezos .= "<tbody id='body_aderezo'>";
			$aderezos .= "<form class='form-goup add_adicionales agrega_aderezo' id='agrega_aderezo' name='agrega_aderezo'>";
		while ($fila = mysqli_fetch_array($res)){
			$aderezos .= "<tr>";
				$aderezos .= "<td width='5'>";
					$aderezos .= "<input type='text' class='form-control' id='$fila[0]' value='$fila[0]' readonly>";
				$aderezos .= "</td>";

				$aderezos .= "<td width='80'>";		
				  	$aderezos .= "<input type='text' class='form-control' id='$fila[0]' value='".strtoupper($fila[2])."' readonly>";
					$aderezos .= "</td>";

				$aderezos .= "<td width='10'>";
				  	$aderezos .= "<input type='text' class='form-control' id='$fila[0]' value='$fila[3]' readonly>";
				$aderezos .= "</td>";	

				$aderezos .= "<td width='5'>";  	
				  	$aderezos .= "<input type='number' class='form-control aderezo_add' placeholder='Cantidad' size='2' maxlength='2' id=''>";
				$aderezos .= "</td>";

			$aderezos .= "</tr>";
		}
		$aderezos .= "</tbody>";
		$aderezos .= "</form>";
	$aderezos .= "</table>";
	return printf($aderezos);
}


function carga_refrescos(){
	include ('../php/conexion.php');

	$sql = "SELECT * FROM refresco WHERE disp_ref = '1' AND public_ref = '1'";
	$res = mysqli_query($conexion, $sql) or die('Error consulta Refrescos');

	$refrescos = "<table class='table table-hover'>";
		$refrescos .= "<form class='form-goup add_adicionaes agrega_refresco' id='agrega_refresco' name='agrega_refresco'>";
		$refrescos .= "<thead>";
			$refrescos .= "<th>ID</th>";
			$refrescos .= "<th>Refresco</th>";
			$refrescos .= "<th>Precio ($)</th>";
			$refrescos .= "<th>Cantidad</th>";
		$refrescos .= "</thead>";
		$refrescos .= "<tbody id='body_refresco'>";

		while ($fila = mysqli_fetch_array($res)){
			$refrescos .= "<tr>";
				$refrescos .= "<td width='5'>";
					$refrescos .= "<input type='text' class='form-control' id='$fila[0]' value='$fila[0]' readonly>";
				$refrescos .= "</td>";

			$refrescos .= "<td width='80'>";
			  	$refrescos .= "<input type='text' class='form-control' id='$fila[0]' value='".strtoupper($fila[2])."' readonly>";
			$refrescos .= "</td>";
			$refrescos .= "<td width='5'>";
			  	$refrescos .= "<input type='text' class='form-control' id='$fila[0]' value='$fila[3]' readonly>";
			$refrescos .= "</td>";			
			$refrescos .= "<td width='10'>";  	
			  	$refrescos .= "<input type='number' class='form-control' placeholder='Cantidad' size='2' maxlength='2'>";
			$refrescos .= "</td>";
			$refrescos .= "</tr>";
		}
		$refrescos .= "</tbody>";
		$refrescos .= "</form>";
	$refrescos .= "</table>";
	return printf($refrescos);
}


function coloca_ade(){
	include ('../php/conexion.php');
	global $total_pedido;
	$total_ade = 0;

	$sql = "SELECT * FROM aderezo_tmp";
	$res = mysqli_query($conexion, $sql) or die('Error consulta Aderezo');
	$aderezos = "<h4> Aderezos Adicionales</h4>";
	$aderezos .= "<table class='table table-hover table-bordered add_adicionaes'>";
		$aderezos .= "<thead style='text-align: center; background: #eaeaea;'>";
			$aderezos .= "<th>Aderezo</th>";
			$aderezos .= "<th>Precio</th>";
			$aderezos .= "<th>Cantidad</th>";
			$aderezos .= "<th>Total</th>";
			$aderezos .= "<th>Eliminar</th>";

		$aderezos .= "</thead>";
		$aderezos .= "<tbody>";

		$aderezos .= "<form class='form-goup'>";
		while ($fila = mysqli_fetch_array($res)){
			$aderezos .= "<tr>";
				$aderezos .= "<td width='85'>$fila[1]";
				$aderezos .= "</td>";
				$aderezos .= "<td width='10'>$ ".$fila[2];
				$aderezos .= "</td>";			
				$aderezos .= "<td width='5'>$fila[3]";
				$aderezos .= "</td>";  
				$ade_tot = ((int)$fila[3]*(int)$fila[2]);

				$total_ade = $total_ade + $ade_tot;
				$aderezos .= "<td width='5'>$ ".$ade_tot;  	
	
				$aderezos .= "</td>";
				$aderezos .= "<td width='5'><a onClick='elimina_ade($fila[0])' ><i class='fa fa-times-circle fa-2x'>";  	
				$aderezos .= "</td>";
				
			$aderezos .= "</tr>";
		}
		$aderezos .= "</form>";
		$aderezos .= "</tbody>";
	$aderezos .= "</table>";
	$aderezos .= "<hr>";
	$total_pedido = $total_pedido + $total_ade;
		$aderezos .= "<div class='tot_ade' id='tot_ade'>";
			$aderezos .= "<label class='total_aderezo'>Total Aderezos</label><br>";
			$aderezos .= "<input type='text' class='total_aderezo' value='$ ".$total_ade."' name='total_aderezo' id='total_aderezo' readonly>";
			$aderezos .= "</div>"; 
			$aderezos .= "<script>";
				$aderezos .= "toGral();";
			$aderezos .= "</script>";

	return printf($aderezos);
}

function coloca_ref(){
	include ('../php/conexion.php');
	global $total_pedido;
	$total_ref = 0;

	$sql = "SELECT * FROM refresco_tmp";
	$res = mysqli_query($conexion, $sql) or die('Error consulta Refresco');
	$ref = "<h4> Refrescos</h4>";
	$ref .= "<table class='table table-hover table-bordered add_adicionaes'>";
		$ref .= "<thead style='text-align: center; background: #eaeaea;'>";
			$ref .= "<th>Refresco</th>";
			$ref .= "<th>Precio</th>";
			$ref .= "<th>Cantidad</th>";
			$ref .= "<th>Total</th>";
			$ref .= "<th>Eliminar</th>";

		$ref .= "</thead>";
		$ref .= "<tbody>";

		$ref .= "<form class='form-goup'>";
		while ($fila = mysqli_fetch_array($res)){
			$ref .= "<tr>";
				$ref .= "<td width='85'>$fila[1]";
				$ref .= "</td>";
				$ref .= "<td width='10'>$ ".$fila[2];
				$ref .= "</td>";			
				$ref .= "<td width='5'>$fila[3]";
				$ref .= "</td>";  
				$ref_tot = ((int)$fila[3]*(int)$fila[2]);

				$total_ref = $total_ref + $ref_tot;
				$ref .= "<td width='5'>$ ".$ref_tot;  	
	
				$ref .= "</td>";
				$ref .= "<td width='5'><a onClick='elimina_ref($fila[0])' ><i class='fa fa-times-circle fa-2x'>";  	
				$ref .= "</td>";
				
			$ref .= "</tr>";
		}
		$ref .= "</form>";
		$ref .= "</tbody>";
	$ref .= "</table>";
	$ref .= "<hr>";
	$total_pedido = $total_pedido + $total_ref;
		$ref .= "<div class='tot_ade' id='tot_ade'>";
			$ref .= "<label class='total_aderezo'>Total Refrescos</label><br>";
			$ref .= "<input type='text' class='total_refresco' value='$ ".$total_ref."' name='total_refresco' id='total_refresco' readonly>";
			$ref .= "</div>"; 
			$ref .= "<script>";
				$ref .= "toGral();";
			$ref .= "</script>";

	return printf($ref);
}

?>