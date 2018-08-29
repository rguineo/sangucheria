<?php 
    require_once('controller/clases.controller.php');
    require_once('models/clases.models.php');
    


    include ("../php/conexion.php");
    include ('../php/seguridad.php');
    include ("vistas.php");
    include ('funciones.php');

    $sql = "SELECT nom_empresa FROM empresa";
    $resultado = mysqli_query($conexion, $sql) or die('Error en la consulta de Empresa');
    $linea = mysqli_fetch_array($resultado);
    $titulo = $linea[0];

    function crearMenu(){
        global $privilegio, $nombre;
        switch ($privilegio){
            case '0': 
                menuAdm($privilegio, $nombre);
                break;

            case '1': 
                menuVenta($privilegio, $nombre);
                break;
        }
    }

    $sql_prod = "SELECT * FROM producto WHERE disp_prod = 1 and public_prod = 1";
    $resultado_prod = mysqli_query($conexion, $sql_prod) or die('Error en la consulta de Producto');


    $sql_ing = "SELECT * FROM ingredientes WHERE disp_ingr = 1 and public_ingr = 1";
    $resultado_ing = mysqli_query($conexion, $sql_ing) or die('Error en la consulta de ingredientes');

 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $titulo; ?></title>
     
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Select2 -->
    <link rel="stylesheet" href="../lib/css/select2.min.css">
    <link rel="stylesheet" href="../lib/css/select2-bootstrap.css">
    
    <!-- Personalizado CSS -->
    <link href="../vendor/bootstrap/css/style.css" rel="stylesheet">

</head>

<body class="text-center">

    <div id="wrapper">
        <nav class='navbar navbar-default navbar-static-top' role='navigation' style='margin-bottom: 0'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='index.php'>Sandwichería El Ajo </a>
            </div>

            <ul class='nav navbar-top-links navbar-right'>
                <li class='dropdown'> 
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                        <i class='fa fa-user fa-fw'></i><?php echo $nombre; ?> <i class='fa fa-caret-down'></i>
                    </a>
                    <ul class='dropdown-menu dropdown-user'>
                        <li><a href='#'><i class='fa fa-user fa-fw'></i> Perfil</a>
                        </li>
                        <li><a href='#'><i class='fa fa-gear fa-fw'></i> Configuraciones</a>
                        </li>
                        <li class='divider'></li>
                        <li><a href='../php/cerrar.php'><i class='fa fa-sign-out fa-fw'></i> Cerrar Sesion</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
        </nav>

        <!-- Navigation -->
       <!--  <?php //crearMenu(); ?> -->

        
            <!-- /.Cuerpo Pagina -->
                <?php ventas(); ?>
            <!-- /.Fin Cuerpo Pagina -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.js"></script>

    <script src="../lib/js/select2.min.js"></script>
    <script src="../lib/js/i18n/es.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="../js/js_custom.js"></script>

    <?php include ("vista_modales.php"); ?>
    <!-- CCS para taba dinamica avanzada -->
    <script src='../js/jquery.dataTables.min.js'></script>
    <script src='../js/dataTables.bootstrap.min.js'></script>
        <!-- Sweet Alert -->
        <script src='../js/sweetalert.min.js'></script>
    <script>
      var selected = new Array();
      
      function checar(){ 
        $(document).ready(function() {
       
      $("input:checkbox:checked").each(function() {
             alert($('#check').text());
        });
       
            });
        }
    </script>
</body>

</html>
