<?php
if(isset($_POST["submit"])){
    if ($_FILES['file']['name']) {

        $filename = explode(".", $_FILES['file']['name']);
        if($filename[1] == 'csv'){
            $handle =fopen($_FILES['file']['tmp_name'], "r");
            while ($data = fgetcsv($handle)) {
                $item1 = mysqli_real_escape_string($connect, $data[0]);
                $item2 = mysqli_real_escape_string($connect, $data[1]);
                $sql="insert into archivo(nombre,email) values ('$item1','$item2')";
                mysqli_query($connect,$sql);

            }
            fclose($handle);
            print "Import done";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Alumnos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/estiloinicio.css">    
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <div id="cabecera">
        <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                        
            <header>
                <li>
                    <h1>
                        Bienvenido docente
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
                            <img src="../Logos/logo.png" width="25%" height="25%">
                        </center>
                    </li>
                    <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a id="Inicio" href="index.php">ALUMNOS <i class="fa fa-address-book"></i></a></li>
                    <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <center>
                            <img src="../Logos/tecmexico.png" width="50%" height="50%">
                        </center>
                    </li>
                    <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="subircsv.php">SUBIR CSV <i class="fa fa-file"></i></a></li>
                    <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <center>
                            <img src="../Logos/petirrojo.jpg" width="30%" height="30%">
                        </center>
                    </li>
                    <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="../cerrar_sesion.php">CERRAR SESION </a></li>

                </ul>
            </nav>
        </header>