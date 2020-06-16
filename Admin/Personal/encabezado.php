<?php
require_once("../../Base_de_datos/conexion.php");
session_start();


if (!isset($_SESSION['rol'])) {
    header('location: ../../index.php?Error=Acceso_denegado');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: ../../index.php?Error=Acceso_denegado');
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../../css/estiloinicioAdmin.css">  
    <link rel="stylesheet" type="text/css" href="../../fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/estiloAdmin.css">
</head>

<body>
    <div id="cabecera">
        <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                        
            <header>
                <li>
                    <h1>
                        Bienvenido administrador
                        <?php
                        echo $_SESSION["nombre_usu"];
                        ?>
                    </h1>

                </li>

            </header>
        </ul>

    </div>
    <div class="content-fluid">
        <header>
            <nav class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul>
                    <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <center>
                            <img src="../../Logos/logo.png" width="25%" height="25%">
                        </center>
                    </li>

                    <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a id="Inicio" href="../Personal/index.php">PERSONAL <i class="fa fa-address-book"></i></a></li>
                    </li>
                    <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="../Departamentos/index.php">DEPARTAMENTOS <i class="fa fa-tty"></i></a></li>
                    </li>
                    <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="../Puestos/index.php">PUESTOS <i class="fa fa-rocket"></i></a></li>
                    </li>   
                    <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="../Cargos/index.php">CARGOS <i class="fa fa-sitemap"></i></a></li>
                    </li>
                    <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="../../cerrar_sesion.php">CERRAR SESION </a></li>

                </ul>
            </nav>
        </header>