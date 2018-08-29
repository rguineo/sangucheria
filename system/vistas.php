<?php 

function cuadros(){
    global $conexion;
    $sumaVentas = 0;
    // Cuenta cantidad de productos   
    $sql1 = "SELECT count(*) FROM producto";
    $resultado1 = mysqli_query($conexion, $sql1) or die('Error Contar Cantidad Productos');
    $fila1 = mysqli_fetch_array($resultado1);

    // Resumen diario de ventas Ingreso de Dinero
    $sql2 = "SELECT aderezo_pedido.cost_aderezo, refresco_pedido.cost_ref, det_venta.total_prod
            FROM aderezo_pedido
            INNER JOIN det_venta
            ON det_venta.id_detventa =  aderezo_pedido.id_detventa
            INNER JOIN refresco_pedido
            ON det_venta.id_detventa = refresco_pedido.id_detventa
            INNER JOIN venta
            ON det_venta.id_venta = venta.id_venta 
            WHERE DAY(venta.fecha_venta) = DAY(NOW())";

    $result = mysqli_query($conexion, $sql2) or die('Error $ Ventas diarias');

    foreach ($result as $key => $value) {
       $sumaVentas = $sumaVentas + $value["cost_aderezo"];
       $sumaVentas = $sumaVentas + $value["cost_ref"];
       $sumaVentas = $sumaVentas + $value["total_prod"];
    }

    // Resumen diario de numero de ventas
    $sql3 = "SELECT count(id_venta) FROM venta WHERE DAY(venta.fecha_venta) = DAY(NOW())";
    $result2 = mysqli_query($conexion, $sql3) or die('Error Contar Cantidad Ventas Diarias');
    $row = mysqli_fetch_array($result2);

   $cajas = "<div class='row cuerpo'>";
        $cajas .= "<div class='col-lg-12'>";
            $cajas .= "<h3 class='page-header'>Escritorio de Administración</h3>";
        $cajas .= "</div>";
        //<!-- /.col-lg-12 -->
    $cajas .= "</div>";
    //<!-- /.row -->
    $cajas .= "<div class='row'>";
        $cajas .= "<div class='col-lg-3 col-md-6'>";
            $cajas .= "<div class='panel panel-primary cuadroP'>";
                $cajas .= "<div class='panel-heading'>";
                    $cajas .= "<div class='row'>";
                        $cajas .= "<div class='col-xs-3'>";
                            $cajas .= "<i class='fa fa-bars fa-5x'></i>";
                        $cajas .= "</div>";
                        $cajas .= "<div class='col-xs-9 text-right'>";
                            $cajas .= "<div class='huge'>".$fila1[0]."</div>";
                            $cajas .= "<div>Tipos de Sandwich</div>";
                        $cajas .= "</div>";
                    $cajas .= "</div>";
                $cajas .= "</div>";
                $cajas .= "<a href='todos_producto.php'>";
                    $cajas .= "<div class='panel-footer'>";
                        $cajas .= "<span class='pull-left'>Ver Detalles</span>";
                        $cajas .= "<span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>";
                        $cajas .= "<div class='clearfix'></div>";
                    $cajas .= "</div>";
                $cajas .= "</a>";
            $cajas .= "</div>";
        $cajas .= "</div>";
        $cajas .= "<div class='col-lg-3 col-md-6'>";
            $cajas .= "<div class='panel panel-green cuadroP'>";
                $cajas .= "<div class='panel-heading'>";
                    $cajas .= "<div class='row'>";
                        $cajas .= "<div class='col-xs-3'>";
                            $cajas .= "<i class='fa fa-tasks fa-5x'></i>";
                        $cajas .= "</div>";
                        $cajas .= "<div class='col-xs-9 text-right'>";
                            $cajas .= "<div class='huge'> $".number_format(resumenVentasMensual(), 0, '', '.')."</div>";
                            $cajas .= "<div>Ventas Acumuladas</div>";
                        $cajas .= "</div>";
                    $cajas .= "</div>";
                $cajas .= "</div>";
                $cajas .= "<a href='#'>";
                    $cajas .= "<div class='panel-footer'>";
                        $cajas .= "<span class='pull-left'>Ver Detalle</span>";
                        $cajas .= "<span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>";
                        $cajas .= "<div class='clearfix'></div>";
                    $cajas .= "</div>";
                $cajas .= "</a>";
            $cajas .= "</div>";
        $cajas .= "</div>";
        $cajas .= "<div class='col-lg-3 col-md-6'>";
            $cajas .= "<div class='panel panel-yellow cuadroP'>";
                $cajas .= "<div class='panel-heading'>";
                    $cajas .= "<div class='row'>";
                        $cajas .= "<div class='col-xs-3'>";
                            $cajas .= "<i class='fa fa-shopping-cart fa-5x'></i>";
                        $cajas .= "</div>";
                        $cajas .= "<div class='col-xs-9 text-right'>";
                            $cajas .= "<div class='huge'> $".number_format(resumenVentasDia(), 0, '', '.')."</div>";
                            $cajas .= "<div>Total Venta Diaria</div>";
                        $cajas .= "</div>";
                    $cajas .= "</div>";
                $cajas .= "</div>";
                $cajas .= "<a href='#'>";
                    $cajas .= "<div class='panel-footer'>";
                        $cajas .= "<span class='pull-left'>Ver Detalles</span>";
                        $cajas .= "<span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>";
                        $cajas .= "<div class='clearfix'></div>";
                    $cajas .= "</div>";
                $cajas .= "</a>";
            $cajas .= "</div>";
        $cajas .= "</div>";
        $cajas .= "<div class='col-lg-3 col-md-6'>";
            $cajas .= "<div class='panel panel-red cuadroP'>";
                $cajas .= "<div class='panel-heading'>";
                    $cajas .= "<div class='row'>";
                        $cajas .= "<div class='col-xs-3'>";
                            $cajas .= "<i class='fa fa-support fa-5x'></i>";
                        $cajas .= "</div>";
                        $cajas .= "<div class='col-xs-9 text-right'>";
                            $cajas .= "<div class='huge'>".$row[0]."</div>";
                            $cajas .= "<div>Cantidad de ventas diaria</div>";
                        $cajas .= "</div>";
                    $cajas .= "</div>";
                $cajas .= "</div>";
                $cajas .= "<a href='#'>";
                    $cajas .= "<div class='panel-footer'>";
                        $cajas .= "<span class='pull-left'>Ver Detalles</span>";
                        $cajas .= "<span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>";
                        $cajas .= "<div class='clearfix'></div>";
                    $cajas .= "</div>";
                $cajas .= "</a>";
            $cajas .= "</div>";
        $cajas .= "</div>";
    $cajas .= "</div>";
return printf($cajas);
}

function menuAdm($level, $usr){

    $menu = "<div class='navbar-default sidebar' role='navigation'>";
        $menu .= "<div class='sidebar-nav navbar-collapse'>";
            $menu .= "<ul class='nav' id='side-menu'>";
                $menu .= "<li>";
                    $menu .= "<a href='index.php'><i class='fa fa-dashboard fa-fw'></i> Panel Control</a>";
                $menu .= "</li>";

// Menu Productos

                $menu .= "<li>";
                    $menu .= "<a href='#'><i class='fa fa-sitemap fa-fw'></i> Productos<span class='fa arrow'></span></a>";
                    $menu .= "<ul class='nav nav-second-level'>";
                        $menu .= "<li>";
                        // Primera Opcion
                            $menu .= "<a href='#'>Sandwich<span class='fa arrow'></span></a>";
                            $menu .= "<ul class='nav nav-third-level'>";
                                $menu .= "<li>";
                                    $menu .= "<a href='#' data-toggle='modal' data-target='#productModal'><i class='fa fa-plus fa-fw'></i> Agregar Sandwich</a>";
                                $menu .= "</li>";
                                $menu .= "<li>";
                                    $menu .= "<a href='todos_producto.php'><i class='fa fa-pencil fa-fw'></i> Todos Sandwich</a>";
                                $menu .= "</li>";
                            $menu .= "</ul>";
                        $menu .= "</li>";    
                        // Segunda Opcion
                            $menu .= "<li>";
                            $menu .= "<a href='#'>Aderezos<span class='fa arrow'></span></a>";
                            $menu .= "<ul class='nav nav-third-level'>";
                                $menu .= "<li>";
                                    $menu .= "<a href='#' data-toggle='modal' data-target='#aderezoModal'><i class='fa fa-plus fa-fw'></i> Agregar</a>";
                                $menu .= "</li>";
                                $menu .= "<li>";
                                    $menu .= "<a href='todos_aderezo.php'><i class='fa fa-pencil fa-fw'></i> Todos Aderezos</a>";
                                $menu .= "</li>";
                            $menu .= "</ul>";
                            $menu .= "</li>";
                        // Tercera Opcion
                            $menu .= "<li>";
                            $menu .= "<a href='#'>Ingredientes<span class='fa arrow'></span></a>";
                            $menu .= "<ul class='nav nav-third-level'>";
                                $menu .= "<li>";
                                    $menu .= "<a href='#' data-toggle='modal' data-target='#ingrModal'><i class='fa fa-plus fa-fw'></i> Agregar</a>";
                                $menu .= "</li>";
                                $menu .= "<li>";
                                    $menu .= "<a href='todos_ingrediente.php'><i class='fa fa-pencil fa-fw'></i> Todos Ingredientes</a>";
                                $menu .= "</li>";
                            $menu .= "</ul>";
                            $menu .= "</li>";
                        // Cuarta Opcion
                            $menu .= "<li>";
                            $menu .= "<a href='#'>Refrescos<span class='fa arrow'></span></a>";
                            $menu .= "<ul class='nav nav-third-level'>";
                                $menu .= "<li>";
                                    $menu .= "<a href='#' data-toggle='modal' data-target='#refModal'><i class='fa fa-plus fa-fw'></i> Agregar</a>";
                                $menu .= "</li>";
                                $menu .= "<li>";
                                    $menu .= "<a href='todos_refresco.php'><i class='fa fa-pencil fa-fw'></i> Todos Refrescos</a>";
                                $menu .= "</li>";
                            $menu .= "</ul>";
                            $menu .= "</li>";
                        $menu .= "</li>";
                    $menu .= "</ul>";
                    // <!-- /.nav-second-level -->
                $menu .= "</li>";
// Menu Ventas
                $menu .= "<li>";
                    $menu .= "<a href='#'><i class='fa fa-table fa-fw'></i> Ventas</a>";
                $menu .= "</li>";

// Menu Stock            
                $menu .= "<li>";
                    $menu .= "<a href='#'><i class='fa fa-edit fa-fw'></i> Stock</a>";
                $menu .= "</li>";

// Menu Usuarios
                $menu .= "<li>";
                    $menu .= "<a href='#'><i class='fa fa-users fa-fw'></i> Usuarios<span class='fa arrow'></span></a>";
                    $menu .= "<ul class='nav nav-second-level'>";
                        $menu .= "<li>";
                            $menu .= "<a href='#' data-toggle='modal' data-target='#usrModal'><i class='fa fa-plus fa-fw'></i> Agregar</a>";
                        $menu .= "</li>";
                        $menu .= "<li>";
                            $menu .= "<a href='todos_usuarios.php'><i class='fa fa-pencil fa-fw'></i>Todos Usuarios</a>";
                        $menu .= "</li>";
                    $menu .= "</ul>";
                $menu .= "</li>";
// Fin
              
           $menu .= " </ul>";
        $menu .= "</div>";
        $menu .= "<a href='index.php' class='logotipo'><img src='../img/logo.jpg' width='115'></a>";
    $menu .= "</div>";
return printf($menu);


}

function Ventas(){
date_default_timezone_set("America/Santiago");
$fecha = date("d-m-Y");

echo '<div class="container cardVentas" style="width: 80rem;">
<center>
<div class="card" style="width: 70rem;">
  <div class="card-body">
    <h2 class="card-title ttle">Punto de Venta</h2>
    <h3 class="card-subtitle mb-2 text-muted"> Sandwichería El Ajo</h3>
    <p class="fecha">Fecha: '.$fecha.'</p>

    <a href="#" class="btn btn-info nva_venta" onclick="resetearVenta()"> Rehacer Venta</a> 
    <br><br>
    <form class="form-group formVta" id="ventaNew">
        <input type="text" class="form-control" id="nom_cliente" placeholder="Nombre Cliente" required><br>

    <a class="btn btn-success agregar" href="#" data-toggle="modal" data-target="#ventaModal">
    Agregar Productos</a>

    <br/><hr>
    <div id="resultados">Productos</div>
    <br>
    <hr>
    <div id="resulAderezos">Aderezos</div>
    <br>
    <hr>
    <div id="resulRefrescos">Refrescos</div>
    <br>
    <hr>

    <div class="form-goup col-md-6">
        <a class="btn btn-warning" title="Aderezo" data-toggle="modal" data-target="#AderModal">
        <i class="fa fa-amazon fa-1x"></i> Aderezo </a>
    </div>

    <div class="form-goup col-md-6">
        <a class="btn btn-info" title="Refresco" data-toggle="modal" data-target="#RefModal">
        <i class="fa fa-coffee fa-1x"></i> Refresco</a>
    </div>
    <br>
	<hr>
	<div class="TotalGeneral col-lg-12" id="TotalGeneral">
		<label>TOTAL GENERAL</label><br>
        <input type="text" id="totGral" name="totGral" class="totGral"> 
        <br>
	    <hr>
    </div>
   
    
    <p style="text-align: left; font-weight: bold;">Observación general de la venta</p>
    <textarea name="obs_venta" id="obs_venta" class="form-control" cols="1"></textarea><br>
 

    <p style="text-align: left; font-weight: bold;">Medio de Pago</p>
    <select class="form-control" name="mpago" id="medioPago">
        <option value="1">EFECTIVO</option>
        <option value="2">DEBITO [Red Compra]</option>
        <option value="3">TARJETA CREDITO</option>
    </select>
    <br/><hr>

    <button type="submit" id="btnVenta" class="btn btn-info btn-lg btn-block" onClick="cargar_base()" disabled> 
    Pagar Pedido <i class="fa fa-print"></i></button>
    </form>
    </div>
</div>
</center>
</div>';

}

function todos_productos(){

    global $conexion;

    $sql = "SELECT id_prod, cod_prod, nom_prod, precio_prod, disp_prod, public_prod
            FROM producto";
  
    $resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Usuarios');

     // $tabla_productos = "<div id='page-wrapper'>";
     //  $tabla_productos = "<div class='container-fluid'>";
     //    $tabla_productos .= "<div class='row'>";
            $tabla_productos = "<div class='col-lg-offset-1 col-lg-10'>";
                $tabla_productos .= "<h4 class='page-header'>Gestion Sandwich - Todos</h4>";
                $tabla_productos .= "<div class='table-responsive table_productos'>";
                    $tabla_productos .= "<table class='table table-striped table-bordered table-hover tabla-usuarios' id='dataTables-example'>";

                        $tabla_productos .= "<thead style='text-align: center; background: #eaeaea;'>";
                            $tabla_productos .= "<tr>";
                                $tabla_productos .= "<th style='text-align: center;'> Codigo</th>";
                                $tabla_productos .= "<th style='text-align: center;'> Nombre Sandwich</th>";
                                $tabla_productos .= "<th style='text-align: center;'> Precio</th>";
                                $tabla_productos .= "<th style='text-align: center;'> Disponible</th>";    
                                $tabla_productos .= "<th style='text-align: center;'> Publicado </th>";
                                $tabla_productos .= "<th style='text-align: center;'> Editar </th>";
                            $tabla_productos .= "</tr>";
                        $tabla_productos .= "</thead>";
                        $tabla_productos .= "<tbody>";
                            while ($row=mysqli_fetch_array($resultado)){
                                $tabla_productos .= "<tr>";
                                    $tabla_productos .= "<td style='text-align: center;'>".strtolower($row[1])."</td>";
                                    $tabla_productos .= "<td>".strtoupper($row[2])."</td>";
                                    $tabla_productos .= "<td> $".$row[3]."</td>";
                                    switch ($row[4]) {
                                        case '0':
                                            $tabla_productos .= "<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[5])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: black;' title='No Disponible'></i></a></td>";
                                            break;
                                        
                                        default:
                                            $tabla_productos .="<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[5])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: green;' title='Disponible'></i></a></td>";
                                            break;
                                    }

                                    switch ($row[5]) {
                                        case '0':
                                            $tabla_productos .= "<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[5])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: black;' title='DesPublicado'></i></a></td>";
                                            break;
                                        
                                        default:
                                            $tabla_productos .="<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[5])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: green;' title='Publicado'></i></a></td>";
                                            break;
                                    }

                                    $tabla_productos .= "<td> <center> 
                                        <a href='edit_producto.php?id=$row[0]' title='Editar'><i class='fa fa-edit fa-2x'></i></a>";

                                    $tabla_productos .= "</tr>";
                                }
                            $tabla_productos .= "</tbody>";
                        $tabla_productos .= "</table>";
                    $tabla_productos .= "</div>";
                $tabla_productos .= "</div>";
     //        $tabla_productos .= "</div>";
     //     $tabla_productos .= "</div>";
     // $tabla_productos .= "</div>";

return printf($tabla_productos);
}


function todos_aderezos(){

    global $conexion;

    $sql = "SELECT id_aderezo, cod_aderezo, nom_aderezo, precio_aderezo, disp_aderezo, public_aderezo
            FROM aderezo";
  
    $resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Usuarios');


$tabla_productos = "<div class='col-lg-offset-1 col-lg-10'>";
$tabla_productos .= "<h4 class='page-header'>Gestion Aderezos - Todos</h4>";
$tabla_productos .= "<div class='table-responsive table_productos'>";
    $tabla_productos .= "<table class='table table-striped table-bordered table-hover tabla-usuarios' id='dataTables-example'>";

        $tabla_productos .= "<thead style='text-align: center; background: #eaeaea;'>";
            $tabla_productos .= "<tr>";
                $tabla_productos .= "<th style='text-align: center;'> Codigo</th>";
                $tabla_productos .= "<th style='text-align: center;'> Nombre</th>";
                $tabla_productos .= "<th style='text-align: center;'> Precio</th>";
                $tabla_productos .= "<th style='text-align: center;'> Disponible</th>";
                $tabla_productos .= "<th style='text-align: center;'> Publicado</th>";     
                $tabla_productos .= "<th style='text-align: center;'> Editar </th>";
            $tabla_productos .= "</tr>";
        $tabla_productos .= "</thead>";
        $tabla_productos .= "<tbody>";
            while ($row=mysqli_fetch_array($resultado)){
                $tabla_productos .= "<tr>";
                    $tabla_productos .= "<td style='text-align: center;'>".strtolower($row[1])."</td>";
                    $tabla_productos .= "<td>".strtoupper($row[2])."</td>";
                    $tabla_productos .= "<td> $".$row[3]."</td>";
                    switch ($row[4]) {
                        case '0':
                            $tabla_productos .= "<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: black;' title='Disponible'></i></a></td>";
                            break;
                        
                        case '1':
                            $tabla_productos .="<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: green;' title='Disponible'></i></a></td>";
                            break;
                    }
                    switch ($row[5]) {
                        case '0':
                            $tabla_productos .= "<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: black;' title='Disponible'></i></a></td>";
                            break;
                        
                        case '1':
                            $tabla_productos .="<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: green;' title='Disponible'></i></a></td>";
                            break;
                    }
                    $tabla_productos .= "<td> <center> 
                        <a href='edit_aderezo.php?id=$row[0]' title='Editar'><i class='fa fa-edit fa-2x'></i></a>";

                    $tabla_productos .= "</tr>";
                }
            $tabla_productos .= "</tbody>";
        $tabla_productos .= "</table>";
    $tabla_productos .= "</div>";
$tabla_productos .= "</div>";
return printf($tabla_productos);
}

function todos_ingredientes(){

    global $conexion;

    $sql = "SELECT id_ingr, cod_ingr, nom_ingr, precio_ingr, disp_ingr, public_ingr
            FROM ingredientes";
  
    $resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Ingredientes');


$tabla_productos = "<div class='col-lg-offset-1 col-lg-10'>";
$tabla_productos .= "<h4 class='page-header'>Gestion Ingredientes - Todos</h4>";
$tabla_productos .= "<div class='table-responsive table_productos'>";
    $tabla_productos .= "<table class='table table-striped table-bordered table-hover tabla-usuarios' id='dataTables-example'>";

        $tabla_productos .= "<thead style='text-align: center; background: #eaeaea;'>";
            $tabla_productos .= "<tr>";
                $tabla_productos .= "<th style='text-align: center;'> Codigo</th>";
                $tabla_productos .= "<th style='text-align: center;'> Nombre</th>";
                $tabla_productos .= "<th style='text-align: center;'> Precio</th>";
                $tabla_productos .= "<th style='text-align: center;'> Disponible</th>"; 
                $tabla_productos .= "<th style='text-align: center;'> Publicado</th>";    
                $tabla_productos .= "<th style='text-align: center;'> Editar </th>";
            $tabla_productos .= "</tr>";
        $tabla_productos .= "</thead>";
        $tabla_productos .= "<tbody>";
            while ($row=mysqli_fetch_array($resultado)){
                $tabla_productos .= "<tr>";
                    $tabla_productos .= "<td style='text-align: center;'>".strtolower($row[1])."</td>";
                    $tabla_productos .= "<td>".strtoupper($row[2])."</td>";
                    $tabla_productos .= "<td> $".$row[3]."</td>";
                    switch ($row[4]) {
                        case '0':
                            $tabla_productos .= "<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: black;' title='Disponible'></i></a></td>";
                            break;
                        
                        case '1':
                            $tabla_productos .="<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: green;' title='Disponible'></i></a></td>";
                            break;
                    }
                    switch ($row[5]) {
                        case '0':
                            $tabla_productos .= "<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: black;' title='Disponible'></i></a></td>";
                            break;
                        
                        case '1':
                            $tabla_productos .="<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: green;' title='Disponible'></i></a></td>";
                            break;
                    }
                    $tabla_productos .= "<td> <center> 
                        <a href='edit_ingredientes.php?id=$row[0]' title='Editar'><i class='fa fa-edit fa-2x'></i></a>";

                    $tabla_productos .= "</tr>";
                }
            $tabla_productos .= "</tbody>";
        $tabla_productos .= "</table>";
    $tabla_productos .= "</div>";
$tabla_productos .= "</div>";
return printf($tabla_productos);
}

function todos_refrescos(){

    global $conexion;

    $sql = "SELECT id_ref, cod_ref, nom_ref, precio_ref, disp_ref, public_ref
            FROM refresco";
  
    $resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Refrescos');


$tabla_productos = "<div class='col-lg-offset-1 col-lg-10'>";
$tabla_productos .= "<h4 class='page-header'>Gestion Refrescos - Todos </h4>";
$tabla_productos .= "<div class='table-responsive table_productos'>";
    $tabla_productos .= "<table class='table table-striped table-bordered table-hover tabla-usuarios' id='dataTables-example'>";

        $tabla_productos .= "<thead style='text-align: center; background: #eaeaea;'>";
            $tabla_productos .= "<tr>";
                $tabla_productos .= "<th style='text-align: center;'> Codigo</th>";
                $tabla_productos .= "<th style='text-align: center;'> Nombre</th>";
                $tabla_productos .= "<th style='text-align: center;'> Precio</th>";
                $tabla_productos .= "<th style='text-align: center;'> Disponible</th>"; 
                $tabla_productos .= "<th style='text-align: center;'> Publicado</th>";   
                $tabla_productos .= "<th style='text-align: center;'> Editar </th>";
            $tabla_productos .= "</tr>";
        $tabla_productos .= "</thead>";
        $tabla_productos .= "<tbody>";
            while ($row=mysqli_fetch_array($resultado)){
                $tabla_productos .= "<tr>";
                    $tabla_productos .= "<td style='text-align: center;'>".strtolower($row[1])."</td>";
                    $tabla_productos .= "<td>".strtoupper($row[2])."</td>";
                    $tabla_productos .= "<td> $".$row[3]."</td>";
                    switch ($row[4]) {
                        case '0':
                            $tabla_productos .= "<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: black;' title='Disponible'></i></a></td>";
                            break;
                        
                        case '1':
                            $tabla_productos .="<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: green;' title='Disponible'></i></a></td>";
                            break;
                    }
                    switch ($row[5]) {
                        case '0':
                            $tabla_productos .= "<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: black;' title='Disponible'></i></a></td>";
                            break;
                        
                        case '1':
                            $tabla_productos .="<td style='text-align: center;'><a href='#' onClick='mostrarEqDes($row[0])' data-toggle='modal' data-target='#deshabEqModal'><i class='fa fa-toggle-on fa-2x' style='color: green;' title='Disponible'></i></a></td>";
                            break;
                    }
                    $tabla_productos .= "<td> <center> 
                        <a href='edit_refresco.php?id=$row[0]' title='Editar'><i class='fa fa-edit fa-2x'></i></a>";

                    $tabla_productos .= "</tr>";
                }
            $tabla_productos .= "</tbody>";
        $tabla_productos .= "</table>";
    $tabla_productos .= "</div>";
$tabla_productos .= "</div>";
return printf($tabla_productos);
}

function todos_usuarios(){
    global $conexion;

    $sql = "SELECT id_usuario, usr_usuario, nom_usuario, ape_usuario, lvl_usuario
            FROM usuarios";
  
    $resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Usuarios');


$tabla_productos = "<div class='col-lg-offset-1 col-lg-10'>";
$tabla_productos .= "<h4 class='page-header'>Gestion Usuarios - Todos</h4>";
$tabla_productos .= "<div class='table-responsive table_productos'>";
    $tabla_productos .= "<table class='table table-striped table-bordered table-hover tabla-usuarios' id='dataTables-example'>";

        $tabla_productos .= "<thead style='text-align: center; background: #eaeaea;'>";
            $tabla_productos .= "<tr>";
                $tabla_productos .= "<th style='text-align: center;'> Usuario</th>";
                $tabla_productos .= "<th style='text-align: center;'> Nombre</th>";
                $tabla_productos .= "<th style='text-align: center;'> Perfil</th>";
                $tabla_productos .= "<th style='text-align: center;'> Acción </th>";
            $tabla_productos .= "</tr>";
        $tabla_productos .= "</thead>";
        $tabla_productos .= "<tbody>";
            while ($row=mysqli_fetch_array($resultado)){
                $tabla_productos .= "<tr>";
                    $tabla_productos .= "<td style='text-align: center;'>".$row[1]."</td>";
                    $tabla_productos .= "<td>".strtoupper($row[2])." ".strtoupper($row[3])."</td>";
                    switch ($row[4]) {
                        case '0':
                            $tabla_productos .= "<td> Administrador</td>";
                            break;
                        case '1':
                            $tabla_productos .= "<td> Usuario Estandar</td>";
                            break;                                      
                        default:
                            # code...
                            break;
                    }

                    $tabla_productos .= "<td> <center> 
                        <a href='edit_usr.php?id=$row[0]' title='Editar'><i class='fa fa-edit fa-2x'></i></a>";

                    $tabla_productos .= "</tr>";
                }
            $tabla_productos .= "</tbody>";
        $tabla_productos .= "</table>";
    $tabla_productos .= "</div>";
$tabla_productos .= "</div>";
return printf($tabla_productos);
}

function edit_producto($id){

    global $conexion;

    $sql = "SELECT id_prod, cod_prod, nom_prod, desc_prod, precio_prod, dcto_prod, disp_prod, public_prod
            FROM producto
            WHERE id_prod = '".$id."'";
  
    $resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Editar Sandwich');
    $row = mysqli_fetch_array($resultado);

    $tabla_productos = "<div class='col-lg-offset-1 col-lg-10'>";
        $tabla_productos .= "<div class='col-lg-8'>";

        $tabla_productos .= "<form action='update_producto.php' method='POST'>";
            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= "<label for='codigo' class='azul'>Codigo Sandwich</label>";

                $tabla_productos .= "<input type='hidden' class='form-control' id='id_prod' name='id_prod' placeholder='codigo producto' value='".$row[0]."'>";

                $tabla_productos .= "<input type='text' class='form-control' id='codigo' name='codigo' placeholder='codigo producto' value='".$row[1]."'>";
                $tabla_productos .= "<label for='nombre' class='azul'>Nombre Sandwich</label>";
                $tabla_productos .= "<input type='text' class='form-control' id='nombre' name='nombre' placeholder='nombre producto' value='".$row[2]."'>";            

            $tabla_productos .= "</div>";

            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= "<label for='descripcion' class='azul'>Descripcion</label>";
                $tabla_productos .= "<textarea class='form-control' id='descripcion' name='descripcion' rows='5'>".$row[3]."</textarea >";
            $tabla_productos .= "</div>";

            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= "<label for='precio' class='azul'>Precio Sandwich</label>";
                $tabla_productos .= "<input type='number' class='form-control' id='precio' name='precio' value='".$row[4]."'>";  
                $tabla_productos .= "<label for='descuento' class='azul'>Descuento Sandwich (porcentaje)</label>";
                $tabla_productos .= "<input type='number' class='form-control' id='descuento' name='descuento' value='".$row[5]."'>";             
            $tabla_productos .= "</div>";

            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= estadoDisponible($row[6]);
            $tabla_productos .= "</div>";
            $tabla_productos .= "<br>";
            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= '<div class="col-sm-10">'; 
                    $tabla_productos .= estadoPublicado($row[7]);
                $tabla_productos .= "</div>";
            $tabla_productos .= "</div>";
            $tabla_productos .= "<br>";
            $tabla_productos .= "<button type='submit' class='btn btn-primary btn-guardar'>Guardar Cambios</button>";
            $tabla_productos .= "<br><br><br>";
        $tabla_productos .= "</form>";

        $tabla_productos .= "</div>";
    $tabla_productos .= "</div>";

return printf($tabla_productos);
}

function estadoPublicado($estado) {
    if ($estado == 1) {
        $es = "<label class='checkbox-inline'>";
            $es .= "<input type='radio' name='publicado' value='1' checked>";
            $es .= "Producto Publicado";
        $es .= "</label>";
        $es .= "<label class='checkbox-inline'>";
            $es .= "<input type='radio' name='publicado' value='0'>";
            $es .= "Producto NO Publicado";
        $es .= "</label>";  
    } 
    else if ($estado == 0) {
        $es = "<label class='checkbox-inline'>";
            $es .= "<input type='radio' name='publicado' value='1'>";
            $es .= " Producto Publicado";
        $es .= "</label>";
        $es .= "<label class='checkbox-inline'>";
            $es .= "<input type='radio' name='publicado' value='0' checked>";
            $es .= " Producto NO Publicado";
        $es .= "</label>";  
    }

    return $es;
}

function estadoDisponible($e) {
    if($e == 1) {
        $est = "<label class='checkbox-inline'>";
            $est .= "<input type='radio' name='disponible' id='optionsRadios1' value='1' checked>";
            $est .= "Disponible";
        $est .= "</label>";
        $est .= "<label class='checkbox-inline'>";
            $est .= "<input type='radio' name='disponible' id='optionsRadios2' value='0'>";
            $est .= "Agotado";
        $est .= "</label>"; 
    } else if ($e == 0) {
        $est = "<label class='checkbox-inline'>";
            $est .= "<input type='radio' name='disponible' id='optionsRadios1' value='1'>";
            $est .= " Disponible";
        $est .= "</label>";
        $est .= "<label class='checkbox-inline'>";
            $est .= "<input type='radio' name='disponible' id='optionsRadios2' value='0' checked>";
            $est .= " Agotado";
        $est .= "</label>"; 
    }
    return $est;
}


function edit_ingrediente($id){

    global $conexion;

    $sql = "SELECT id_ingr, cod_ingr, nom_ingr, precio_ingr, disp_ingr, public_ingr
            FROM ingredientes
            WHERE id_ingr = '".$id."'";
  
    $resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Editar Producto');
    $row = mysqli_fetch_array($resultado);

    $tabla_productos = "<div class='col-lg-offset-1 col-lg-10'>";
        $tabla_productos .= "<div class='col-lg-8'>";

        $tabla_productos .= "<form action='update_ingrediente.php' method='POST'>";
            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= "<label for='codigo' class='azul'>Codigo Ingrediente</label>";

                $tabla_productos .= "<input type='hidden' class='form-control' id='id_prod' name='id_ingr' placeholder='codigo producto' value='".$row[0]."'>";

                $tabla_productos .= "<input type='text' class='form-control' id='codigo' name='codigo' placeholder='codigo producto' value='".$row[1]."'>";
                $tabla_productos .= "<label for='nombre' class='azul'>Nombre Ingrediente</label>";
                $tabla_productos .= "<input type='text' class='form-control' id='nombre' name='nombre' placeholder='nombre producto' value='".$row[2]."'>";            

            $tabla_productos .= "</div>";

            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= "<label for='precio' class='azul'>Precio Ingrediente</label>";
                $tabla_productos .= "<input type='number' class='form-control' id='precio' name='precio' value='".$row[3]."'>";           
            $tabla_productos .= "</div>";

            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= estadoDisponible($row[4]);
            $tabla_productos .= "</div>";
            $tabla_productos .= "<br>";
            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= '<div class="col-sm-10">'; 
                    $tabla_productos .= estadoPublicado($row[5]);
                $tabla_productos .= "</div>";
            $tabla_productos .= "</div>";
            $tabla_productos .= "<br>";
            $tabla_productos .= "<button type='submit' class='btn btn-primary btn-guardar'>Guardar Cambios</button>";
            $tabla_productos .= "<br><br><br>";
        $tabla_productos .= "</form>";

        $tabla_productos .= "</div>";
    $tabla_productos .= "</div>";

return printf($tabla_productos);
}

function edit_aderezo($id){

    global $conexion;

    $sql = "SELECT id_aderezo, cod_aderezo, nom_aderezo, precio_aderezo, disp_aderezo, public_aderezo
            FROM aderezo
            WHERE id_aderezo = '".$id."'";
  
    $resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Editar Aderezo');
    $row = mysqli_fetch_array($resultado);

    $tabla_productos = "<div class='col-lg-offset-1 col-lg-10'>";
        $tabla_productos .= "<div class='col-lg-8'>";

        $tabla_productos .= "<form action='update_aderezo.php' method='POST'>";
            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= "<label for='codigo' class='azul'>Codigo Aderezo</label>";

                $tabla_productos .= "<input type='hidden' class='form-control' id='id_prod' name='id_aderezo' placeholder='codigo Aderezo' value='".$row[0]."'>";

                $tabla_productos .= "<input type='text' class='form-control' id='codigo' name='codigo' placeholder='codigo Aderezo' value='".$row[1]."'>";
                $tabla_productos .= "<label for='nombre' class='azul'>Nombre Aderezo</label>";
                $tabla_productos .= "<input type='text' class='form-control' id='nombre' name='nombre' placeholder='nombre Aderezo' value='".$row[2]."'>";            

            $tabla_productos .= "</div>";

            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= "<label for='precio' class='azul'>Precio Aderezo</label>";
                $tabla_productos .= "<input type='number' class='form-control' id='precio' name='precio' value='".$row[3]."'>";           
            $tabla_productos .= "</div>";

            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= estadoDisponible($row[4]);
            $tabla_productos .= "</div>";
            $tabla_productos .= "<br>";
            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= '<div class="col-sm-10">'; 
                    $tabla_productos .= estadoPublicado($row[5]);
                $tabla_productos .= "</div>";
            $tabla_productos .= "</div>";
            $tabla_productos .= "<br>";
            $tabla_productos .= "<button type='submit' class='btn btn-primary btn-guardar'>Guardar Cambios</button>";
            $tabla_productos .= "<br><br><br>";
        $tabla_productos .= "</form>";

        $tabla_productos .= "</div>";
    $tabla_productos .= "</div>";

return printf($tabla_productos);
}

function edit_refresco($id){

    global $conexion;

    $sql = "SELECT id_ref, cod_ref, nom_ref, precio_ref, disp_ref, public_ref
            FROM refresco
            WHERE id_ref = '".$id."'";
  
    $resultado = mysqli_query($conexion, $sql) or die('Error en la consulta Editar Refresco');
    $row = mysqli_fetch_array($resultado);

    $tabla_productos = "<div class='col-lg-offset-1 col-lg-10'>";
        $tabla_productos .= "<div class='col-lg-8'>";

        $tabla_productos .= "<form action='update_refresco.php' method='POST'>";
            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= "<label for='codigo' class='azul'>Codigo Refresco</label>";

                $tabla_productos .= "<input type='hidden' class='form-control' id='id_prod' name='id_ref' placeholder='codigo Refresco' value='".$row[0]."'>";

                $tabla_productos .= "<input type='text' class='form-control' id='codigo' name='codigo' placeholder='codigo Refresco' value='".$row[1]."'>";
                $tabla_productos .= "<label for='nombre' class='azul'>Nombre Refresco</label>";
                $tabla_productos .= "<input type='text' class='form-control' id='nombre' name='nombre' placeholder='nombre Refresco' value='".$row[2]."'>";            

            $tabla_productos .= "</div>";

            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= "<label for='precio' class='azul'>Precio Refresco</label>";
                $tabla_productos .= "<input type='number' class='form-control' id='precio' name='precio' value='".$row[3]."'>";           
            $tabla_productos .= "</div>";

            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= estadoDisponible($row[4]);
            $tabla_productos .= "</div>";
            $tabla_productos .= "<br>";
            $tabla_productos .= "<div class='form-group'>";
                $tabla_productos .= '<div class="col-sm-10">'; 
                    $tabla_productos .= estadoPublicado($row[5]);
                $tabla_productos .= "</div>";
            $tabla_productos .= "</div>";
            $tabla_productos .= "<br>";
            $tabla_productos .= "<button type='submit' class='btn btn-primary btn-guardar'>Guardar Cambios</button>";
            $tabla_productos .= "<br><br><br>";
        $tabla_productos .= "</form>";

        $tabla_productos .= "</div>";
    $tabla_productos .= "</div>";

return printf($tabla_productos);
}


function resumenVentasMensual(){
    global $conexion;
    global $totalVenta;

    $sql3 = "SELECT venta.id_venta, det_venta.id_detventa, date(venta.fecha_venta) as Fecha, time(venta.fecha_venta) as Hora, UPPER(producto.nom_prod) as Producto, det_venta.total_prod as valProd
            FROM venta
            INNER JOIN det_venta
            ON venta.id_venta = det_venta.id_detventa
            INNER JOIN producto
            ON det_venta.id_producto = producto.id_prod
            WHERE month(date(venta.fecha_venta))=month(date(NOW()))
            ORDER BY venta.id_venta DESC";
    $resul3 = mysqli_query($conexion, $sql3) or die('Error en la consulta Ventas');  

    while($row3=mysqli_fetch_array($resul3) ) {
        $id_detalleVenta = $row3[1];

        $sql1 = "SELECT sum(refresco_pedido.cost_ref) as Refrescos
                FROM refresco_pedido
                WHERE id_detventa = $id_detalleVenta";

        $resul1 = mysqli_query($conexion, $sql1) or die('Error en la consulta Refrescos');
        $row1=mysqli_fetch_array($resul1);

        $sql2 = "SELECT sum(aderezo_pedido.cost_aderezo) as Aderezos
                FROM aderezo_pedido
                WHERE id_detventa = $id_detalleVenta";

        $resul2 = mysqli_query($conexion, $sql2) or die('Error en la consulta Aderezos');
        $row2=mysqli_fetch_array($resul2);

        $Total = $row3[5]+$row2[0]+$row1[0];
        $totalVenta = $totalVenta + $Total;
    }

    return $totalVenta;
}

function resumenVentasDia(){
    global $conexion;
    global $totalVentaDia;

    $sql3 = "SELECT venta.id_venta, det_venta.id_detventa, date(venta.fecha_venta) as Fecha, time(venta.fecha_venta) as Hora, UPPER(producto.nom_prod) as Producto, det_venta.total_prod as valProd
            FROM venta
            INNER JOIN det_venta
            ON venta.id_venta = det_venta.id_detventa
            INNER JOIN producto
            ON det_venta.id_producto = producto.id_prod
            WHERE date(venta.fecha_venta)=date(NOW())
            ORDER BY venta.id_venta DESC";
    $resul3 = mysqli_query($conexion, $sql3) or die('Error en la consulta Ventas');  

    while($row3=mysqli_fetch_array($resul3) ) {
        $id_detalleVenta = $row3[1];

        $sql1 = "SELECT sum(refresco_pedido.cost_ref) as Refrescos
                FROM refresco_pedido
                WHERE id_detventa = $id_detalleVenta";

        $resul1 = mysqli_query($conexion, $sql1) or die('Error en la consulta Refrescos');
        $row1=mysqli_fetch_array($resul1);

        $sql2 = "SELECT sum(aderezo_pedido.cost_aderezo) as Aderezos
                FROM aderezo_pedido
                WHERE id_detventa = $id_detalleVenta";

        $resul2 = mysqli_query($conexion, $sql2) or die('Error en la consulta Aderezos');
        $row2=mysqli_fetch_array($resul2);

        $Total = $row3[5]+$row2[0]+$row1[0];
        $totalVentaDia = $totalVentaDia + $Total;
    }

    return $totalVentaDia;
}


function contenidoAdmin(){
    global $conexion;
    global $totalVenta;

    $sql3 = "SELECT venta.id_venta, det_venta.id_detventa, date(venta.fecha_venta) as Fecha, time(venta.fecha_venta) as Hora, UPPER(producto.nom_prod) as Producto, det_venta.total_prod as valProd
            FROM venta
            INNER JOIN det_venta
            ON venta.id_venta = det_venta.id_detventa
            INNER JOIN producto
            ON det_venta.id_producto = producto.id_prod
            ORDER BY venta.id_venta DESC";

    $resul3 = mysqli_query($conexion, $sql3) or die('Error en la consulta Ventas');    

    $venta = "<div class='col-lg-offset-1 col-lg-10'>";
    $venta .= "<center><h2 class='page-header resumenVentas'><img src='../img/logo.jpg' width='50'> Resumen ventas totales <img src='../img/logo.jpg' width='50'></h2></center>";
    $venta .= "<div class='table-responsive table_productos'>";
        $venta .= "<table class='table table-striped table-bordered table-hover tabla-resumen' id='dataTables-example'>";

            $venta .= "<thead style='text-align: center; background: #eaeaea;'>";
                $venta .= "<tr>";
                    $venta .= "<th style='text-align: center;'> # Venta</th>";
                    $venta .= "<th style='text-align: center;'> Fecha</th>";
                    $venta .= "<th style='text-align: center;'> Hora</th>";
                    $venta .= "<th style='text-align: center;'> Producto</th>";
                    $venta .= "<th style='text-align: center;'> $ Prod+IngEx</th>";
                    $venta .= "<th style='text-align: center;'> $ Aderezo </th>";
                    $venta .= "<th style='text-align: center;'> $ Refresco</th>";
                    $venta .= "<th style='text-align: center;'> $ Total Venta </th>";
                    $venta .= "<th style='text-align: center;'> Acción </th>";
                $venta .= "</tr>";
            $venta .= "</thead>";
            $venta .= "<tbody>";
                while($row3=mysqli_fetch_array($resul3) ) {
                    $id_detalleVenta = $row3[1];

                    $sql1 = "SELECT sum(refresco_pedido.cost_ref) as Refrescos
                            FROM refresco_pedido
                            WHERE id_detventa = $id_detalleVenta";

                    $resul1 = mysqli_query($conexion, $sql1) or die('Error en la consulta Refrescos');
                    $row1=mysqli_fetch_array($resul1);

                    $sql2 = "SELECT sum(aderezo_pedido.cost_aderezo) as Aderezos
                            FROM aderezo_pedido
                            WHERE id_detventa = $id_detalleVenta";

                    $resul2 = mysqli_query($conexion, $sql2) or die('Error en la consulta Aderezos');
                    $row2=mysqli_fetch_array($resul2);

                    // Print Values
                    $venta .= "<tr>";
                        $venta .= "<td style='text-align: center;'>".$row3[0]."</td>";

                        $venta .= "<td>".$row3[2]."</td>";                
                        $venta .= "<td>".$row3[3]."</td>";
                        $venta .= "<td>".$row3[4]."</td>";
                        $venta .= "<td> $".number_format($row3[5], 0, '', '.')."</td>";
                        
                        $venta .= "<td> $".number_format($row2[0], 0, '', '.')."</td>";
                        $venta .= "<td> $".number_format($row1[0], 0, '', '.')."</td>";
                        $Total = $row3[5]+$row2[0]+$row1[0];
                        $totalVenta = $totalVenta + $Total;
                        $venta .= "<td> $".number_format($Total, 0, '', '.')."</td>";

                        $venta .= "<td> <center> 
                            <a href='#' class='' title='Ver'><i class='fa fa-search'></i></a>";

                    $venta .= "</tr>";
                }

                $totalVenta = 0;

                $venta .= "</tbody>";
            $venta .= "</table>";
        $venta .= "</div>";
    $venta .= "</div>";
    return printf($venta);
}
?>