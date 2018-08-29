<?php 
    include('../php/conexion.php');
    include('imprimir.php');
  
    $nom = $_POST['nom'];
    // $fec = date('Y-m-d');
    $obs = $_POST['obs'];
    $mpago = $_POST['mpago'];


    $sql1 = "INSERT INTO venta(fecha_venta, nom_venta, obs_venta, mpago_venta) VALUES(NOW(),'$nom', '$obs', '$mpago')";
    
    $resultado1 = mysqli_query($conexion, $sql1) or die('Error en la insercion de venta');

    $sql2 = "SELECT id_venta FROM venta ORDER BY id_venta desc LIMIT 1";

    $resultado2 = mysqli_query($conexion, $sql2) or die('Error en la consulta venta');
    $linea2 = mysqli_fetch_array($resultado2);

    $id_vta = $linea2[0]; //Id de Venta

    $sql3 = "SELECT * FROM temp";
    $resultado3 = mysqli_query($conexion, $sql3) or die('Error en la consulta venta');
    while ($linea3 = mysqli_fetch_assoc($resultado3)){
    	$id_p = $linea3['id_prod'];
    	$obs_p = $linea3['obs_prod'];
    	$uni_p = $linea3['uni_prod'];
    	$val_p = $linea3['val_ing_prod'];
    	$ingex_p = $linea3['ing_ext_prod'];
    	$cant_p = $linea3['cant_prod'];
    	$tot_p = $linea3['tot_prod'];
    	
    	$sql4 = "INSERT INTO det_venta(id_venta, id_producto, uni_producto, obs_producto, val_ing, ing_extprod, cant_producto, total_prod) 
    	VALUES('$id_vta', '$id_p', '$uni_p', '$obs_p', '$val_p', '$ingex_p', '$cant_p', '$tot_p')";
    	mysqli_query($conexion, $sql4) or die('Error en la insersion de venta');
    } 

    // Agreagr aderezos_temporales a tabla aderezo_pedido
    $sql_det = "SELECT * FROM det_venta ORDER BY id_detventa DESC LIMIT 1";
    $resultadoDet = mysqli_query($conexion, $sql_det) or die('Error en la consulta DetVenta');
    $row1 = mysqli_fetch_assoc($resultadoDet);
    $id_detVenta = $row1["id_detventa"];

    $sql4 = "SELECT * FROM aderezo_tmp";
    $resultado4 = mysqli_query($conexion, $sql4) or die('Error en la consulta Aderezo');
    while ($linea4 = mysqli_fetch_assoc($resultado4)){
        $id_a = $linea4['id_ade'];
        $cos_a = $linea4['cos_ade'];
        $can_a = $linea4['can_ade'];
       
        $sql5 = "INSERT INTO aderezo_pedido(cant_aderezo, id_aderezo, id_detventa, cost_aderezo) 
        VALUES('$can_a', '$id_a', '$id_detVenta', '$cos_a')";
       
        mysqli_query($conexion, $sql5) or die('Error en la insersion de Aderezo ;)');
    } 

    // Agreagr refresco_temporales a tabla refresco_pedido
    $sql6 = "SELECT * FROM refresco_tmp";

    $resultado6 = mysqli_query($conexion, $sql6) or die('Error en la consulta Refresco');
    while ($linea6 = mysqli_fetch_assoc($resultado6)){
        $id_r = $linea6['id_ref'];
        $cos_r = $linea6['cos_ref'];
        $can_r = $linea6['can_ref'];
       
        $sql7 = "INSERT INTO refresco_pedido(cant_ref, id_ref, id_detventa, cost_ref) 
        VALUES('$can_r', '$id_r', '$id_detVenta', '$cos_r')";
      
        mysqli_query($conexion, $sql7) or die('Error en la insersion de Refresco');
    }   

    printVoucher();
?>