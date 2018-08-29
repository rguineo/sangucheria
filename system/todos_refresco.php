<?php 
    include ("../php/conexion.php");
    include ('../php/seguridad.php');
    include ("vistas.php");


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
                menuStd($privilegio, $nombre);
                echo "Usuario Basico";
                break;
        }
    }
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

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Personalizado CSS -->
    <link href="../vendor/bootstrap/css/style.css" rel="stylesheet">

    <!-- CCS para taba dinamica avanzada -->
    <link href='../vendor/bootstrap/css/dataTables.bootstrap.css' rel='stylesheet'>
    <link href='../vendor/bootstrap/css/dataTables.responsive.css' rel='stylesheet'>


</head>

<body>

    <div id="wrapper">
<nav class='navbar navbar-default navbar-static-top' role='navigation' style='margin-bottom: 0'>
    <div class='navbar-header'>
        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
        </button>
        <a class='navbar-brand' href='index.php'>
        </a>
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
        <?php crearMenu(); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Refrescos <i class='fa fa-coffee'></i></h1>
                </div>
                <!-- /.col-lg-12 -->
  
            <!-- /.row -->
             <?php todos_refrescos(); ?>   
            <!-- /.Cuerpo Pagina -->
            </div>
            <!-- /.Fin Cuerpo Pagina -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src='../js/jquery.dataTables.min.js'></script>
    <script src='../js/dataTables.bootstrap.min.js'></script>
    <script src='../js/js_custom.js'></script>

    <?php include ("vista_modales.php"); ?>
</body>

</html>
