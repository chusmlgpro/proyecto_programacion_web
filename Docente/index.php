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
include_once "encabezado.php";
?>

<a href="insertarCalificacion.php">
    <button id="aceptar">
        <i class="fa fa-user"></i>
        Registrar nueva calificacion
        <i class="fa fa-plus"></i>
    </button>
</a>

<div>
    <center>
        <table class="table table-hover">
            <tr>
                <th scope="col">
                    <center>No.CONTROL</center>
                </th>
                <th scope="col">
                    <center>NOMBRE</center>
                </th>
                <th scope="col">
                    <center>PATERNO</center>
                </th>
                <th scope="col">
                    <center>MATERNO</center>
                </th>
                <th scope="col">
                    <center>CALIFICACION</center>
                </th>
                <th scope="col">
                    <center>DOCENTE</center>
                </th>
                <th scope="col">
                    <center>FECHA</center>
                </th>
                <th scope="col">
                    <center>OPCIONES</center>
                </th>
            </tr>

            <?PHP
            //$group_by = "calificaciones.cve_alu";
            $consulta = "SELECT * from calificaciones join alumnos on alumnos.cve_alu = calificaciones.cve_alu join usuarios_cargos on usuarios_cargos.cve_usu=calificaciones.cve_usu join puestos on puestos.cve_pue = usuarios_cargos.cve_pue join personals on personals.cve_per = usuarios_cargos.cve_per join departamentos on departamentos.cve_dep = usuarios_cargos.cve_dep where usuarios_cargos.cve_usu = " . $_SESSION["cve_usu"]; //. " group by " . $group_by; //cambiar
            $ejecuta = mysqli_query($mysqli, $consulta);
            while ($res = mysqli_fetch_assoc($ejecuta)) {
                echo '<tr id="datosTabla" >        
                        <td scope="row">' . $res['cve_alu'] . '</td>            
                        <td scope="row">' . $res['nombre_alu'] . '</td>
                        <td scope="row">' . $res['app_alu'] . '</td>
                        <td scope="row">' . $res['apm_alu'] . '</td>        
                        <td scope="row">' . $res['califi_cal'] . '</td>  
                        <td scope="row">' . $res['nombre_per'] . '</td>      
                        <td scope="row">' . $res['datetime_cal'] . '</td>                

                <td scope="row">
                    <a href="verCalificacion.php?cve=' . $res['cve_cal'] . '">                
                        <button type="button" class="btn btn-warning"><i class="fas fa-user"></i></button>
                    </a>
                </td>        

                <td scope="row"> 
                    <a href="modificarCalificacion.php?cve=' . $res['cve_cal'] . '">                
                        <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                </td>

                <td scope="row" id = "btneliminar">
                    <a href="eliminarCalificacion.php?cve=' . $res['cve_cal'] . '">                        
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </a>
                </td>
            </tr>';
            }   ?>
        </table>
    </center>
</div>
