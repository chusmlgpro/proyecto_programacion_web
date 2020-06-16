<?php
require_once("../Base_de_datos/conexion.php");
session_start();


if (!isset($_SESSION['rol'])) {
    header('location: ../index.php?Error=Acceso_denegado');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: ../index.php?Error=Acceso_denegado');
    }
}
?>

<?php

if (isset($_POST["submit"])) {
    if ($_FILES['file']['name']) {

        $filename = explode(".", $_FILES['file']['name']);
        if ($filename[1] == 'csv') {
            $handle = fopen($_FILES['file']['tmp_name'], "r");
            while ($data = fgetcsv($handle)) {
                $item1 = mysqli_real_escape_string($mysqli, $data[0]);//numero de control
                $item2 = mysqli_real_escape_string($mysqli, $data[1]);//calificacion


//                $sql = "insert into calificaciones values ('$item1','$item2')";
  //              mysqli_query($connect, $sql);


                $consulta2 = "INSERT into calificaciones (cve_cal,califi_cal,cve_alu,cve_usu,datetime_cal) 
        VALUES (null,'$item2','$item1'," . $_SESSION["cve_usu"] . ",now()   )";
                //echo $consultacopia = "insert into alumnocopia (cve_alu,nom_alu,app_alu,apm_alu,tel_alu,mensualidad_alu,grupo_alu,fchaing_alu) VALUES ('" . $_GET['cve_alu'] . "','" . $_GET['nom_alu'] . "','" . $_GET['app_alu'] . "','" . $_GET['apm_alu'] . "','" . $_GET['tel_alu'] . "','" . $_GET['mensualidad_alu'] . "','" . $_GET['grupo_alu'] . "',curdate()   )";
                $ejecuta2 = mysqli_query($mysqli, $consulta2);
                //$ejecutacopia = mysqli_query($mysqli, $consultacopia);

                $res = $mysqli->affected_rows;

                if ($res == 1) {
                    echo '<script> location.href="index.php";</script>';
                } 
            }
            fclose($handle);
            print "Import done";
        }
    }
}
?>

<?php
    include_once "encabezado.php";
?>


<body>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group" align = "center">
            <p>Primero selecciona el archivo: <input type='file' name='file' /></p>
            <p><input type='submit' name='submit' value='Enviar datos' id="Inicio"/></p>
        </div>
    </form>
</body>

</html>

