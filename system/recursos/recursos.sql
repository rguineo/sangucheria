// Eliminar Tablas

drop table log;
drop table aderezo_tmp;
drop table aderezo_pedido;
drop table aderezo;
drop table tmp_cotizacion;
drop table temp;
drop table refresco_pedido;
drop table refresco;
drop table ing_extra;
drop table ingredientes;
drop table usuarios;
drop table empresa;
drop table det_venta;
drop table producto;
drop table venta;

// Limpiar tablas
truncate table refresco_pedido;
truncate table aderezo_pedido;
truncate table det_venta;
truncate table venta;

ALTER TABLE refresco_pedido AUTO_INCREMENT=1
ALTER TABLE aderezo_pedido AUTO_INCREMENT=1
ALTER TABLE det_venta AUTO_INCREMENT=1
ALTER TABLE venta AUTO_INCREMENT=1



SELECT aderezo_pedido.cost_aderezo, refresco_pedido.cost_ref, det_venta.total_prod
FROM aderezo_pedido
INNER JOIN det_venta
ON det_venta.id_detventa =  aderezo_pedido.id_detventa
INNER JOIN refresco_pedido
ON det_venta.id_detventa = refresco_pedido.id_detventa
INNER JOIN venta
ON det_venta.id_venta = venta.id_venta 
WHERE DAY(venta.fecha_venta) = DAY(NOW())



SELECT venta.id_venta, det_venta.id_detventa, date(venta.fecha_venta) as Fecha, time(venta.fecha_venta) as Hora, UPPER(producto.nom_prod) as Producto, det_venta.total_prod as valProd, aderezo_pedido.cost_aderezo as valAder, refresco_pedido.cost_ref valRef, (det_venta.total_prod+aderezo_pedido.cost_aderezo+refresco_pedido.cost_ref) as totalVenta
        FROM venta
        INNER JOIN det_venta
        ON det_venta.id_venta = venta.id_venta
        INNER JOIN aderezo_pedido
        ON aderezo_pedido.id_detventa = det_venta.id_detventa
        INNER JOIN refresco_pedido
        ON det_venta.id_detventa = refresco_pedido.id_detventa
        INNER JOIN producto
        ON det_venta.id_producto = producto.id_prod
        ORDER BY date(venta.fecha_venta) AND time(venta.fecha_venta) DESC
        GROUP BY det_venta.id_detventa

// Funciona por separado
SELECT sum(refresco_pedido.cost_ref), det_venta.id_detventa
FROM det_venta
INNER JOIN refresco_pedido
ON refresco_pedido.id_detventa = det_venta.id_detventa
GROUP BY id_detventa
ORDER BY det_venta.id_detventa DESC

SELECT sum(aderezo_pedido.cost_aderezo), det_venta.id_detventa
FROM det_venta
INNER JOIN aderezo_pedido
ON aderezo_pedido.id_detventa = det_venta.id_detventa
GROUP BY id_detventa
ORDER BY det_venta.id_detventa DESC

SELECT venta.id_venta, det_venta.id_detventa, date(venta.fecha_venta) as Fecha, time(venta.fecha_venta) as Hora, UPPER(producto.nom_prod) as Producto, det_venta.total_prod as valProd
FROM venta
INNER JOIN det_venta
ON venta.id_venta = det_venta.id_detventa
INNER JOIN producto
ON det_venta.id_producto = producto.id_prod
ORDER BY venta.id_venta DESC


    $sql1 = "SELECT sum(refresco_pedido.cost_ref), det_venta.id_detventa
            FROM det_venta
            INNER JOIN refresco_pedido
            ON refresco_pedido.id_detventa = det_venta.id_detventa
            GROUP BY id_detventa
            ORDER BY det_venta.id_detventa DESC";

    $resul1 = mysqli_query($conexion, $sql1) or die('Error en la consulta Refrescos');
    $row1=mysqli_fetch_array($resul1);

    $sql2 = "SELECT sum(aderezo_pedido.cost_aderezo), det_venta.id_detventa
            FROM det_venta
            INNER JOIN aderezo_pedido
            ON aderezo_pedido.id_detventa = det_venta.id_detventa
            GROUP BY id_detventa
            ORDER BY det_venta.id_detventa DESC";

    $resul2 = mysqli_query($conexion, $sql2) or die('Error en la consulta Aderezos');
    $row2=mysqli_fetch_array($resul2);