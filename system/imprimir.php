<?php 
require __DIR__ . '/src/autoload.php'; 
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
date_default_timezone_set("America/Santiago");

function printVoucher(){
include('../php/conexion.php');

$sql1 = "SELECT * FROM venta ORDER BY id_venta DESC LIMIT 1" ;
$res1 = mysqli_query($conexion, $sql1) or die('Error consulta ventas');
$linea1 = mysqli_fetch_assoc($res1);
$id_venta = $linea1['id_venta'];
$nombre = $linea1['nom_venta'];
$fecha = $linea1['fecha_venta'];
$obsVenta = $linea1['obs_venta'];
$mpago = $linea1['mpago_venta'];

 
$nombre_impresora = "EPSON";  //nombre impresora en el sistema operativo

$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
 
 
# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);
 
/*
	Intentaremos cargar e imprimir
	el logo
*/
try{
	$logo = EscposImage::load("logo.png", false);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}
 
/*
	Imprimir un encabezado
*/
 
$printer->text("Sandwichería El Ajo" . "\n");
$printer->text("Ancud - Chiloé" . "\n");
$printer->text("---------------------" . "\n");
#La fecha también
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("Fecha: ".$fecha."  Hora: ".date("H:i:s") . "\n");
$printer->text("Cliente: " .strtoupper($nombre). "\n");
$printer->text("------------------------------------------------" . "\n");
$printer->text("ITEM | CANTIDAD | DETALLE PRODUCTO" . "\n");
$printer->text("------------------------------------------------" . "\n");
/*
	Ahora vamos a imprimir los
	productos
*/

$sql2 = "SELECT det_venta.uni_producto, det_venta.obs_producto, det_venta.val_ing, det_venta.ing_extprod, det_venta.cant_producto, det_venta.total_prod, producto.nom_prod  
	FROM det_venta 
	INNER JOIN producto
	ON det_venta.id_producto = producto.id_prod
	WHERE det_venta.id_venta = '".$id_venta."'";

$res2 = mysqli_query($conexion, $sql2) or die('Error consulta det_ventas');
$printer->setJustification(Printer::JUSTIFY_LEFT);
$item = 0;
while ($linea2 = mysqli_fetch_array($res2)){
	$item = $item + 1;
	 $printer->text(" [" .$item . "]      " .  $linea2[4]. "       " . strtoupper($linea2[6]) . "\n" ."    Extras-> " .strtoupper($linea2[3]) ."\n");
	 $observacion = array("[".$item."] ".strtoupper($linea2[1]));
}
 
$printer->text("------------------------------------------------" . "\n");
 
/*
	Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_LEFT);

$printer->text("COMENTARIOS:" . "\n");
foreach($observacion as $obs){
	$printer->text($obs. "\n");
}

$printer->text("------------------------------------------------" . "\n");

$printer->text("ADEREZOS: " . "\n");

$sql3 = "SELECT * FROM aderezo_tmp";
$res3 = mysqli_query($conexion, $sql3) or die('Error consulta det_ventas');
$item = 0;

while ($linea3 = mysqli_fetch_array($res3)){
	$item = $item + 1;
	 $printer->text(" [" .$item . "]      " .  $linea3[3]. "       " . strtoupper($linea3[1]) . "\n");
}

$printer->text("------------------------------------------------" . "\n");

$printer->text("REFRESCOS: " . "\n");

$sql4 = "SELECT * FROM refresco_tmp";
$res4 = mysqli_query($conexion, $sql4) or die('Error consulta det_ventas');
$item = 0;

while ($linea4 = mysqli_fetch_array($res4)){
	$item = $item + 1;
	 $printer->text(" [" .$item . "]      " .  $linea4[3]. "       " . strtoupper($linea4[1]) . "\n");
}
$printer->text("------------------------------------------------" . "\n");
$printer->text("OBSERVACION: " . "\n");
$printer->text(strtoupper($obsVenta) . "\n");

/*Alimentamos el papel 3 veces*/
$printer->feed(3);
 
/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();
 
/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();
 
/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();
echo "<script>";
	echo "resetearVenta();";
echo "</script>";
}
?>