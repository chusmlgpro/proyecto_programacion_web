<?php
include_once "encabezado.php";
?>

<a href="insertarDepartamentos.php">
    <button id="aceptar">
        <i class="fa fa-user"></i>
        Registrar nuevo departamento
        <i class="fa fa-plus"></i>
    </button>
</a>

<div>
    <center>
        <table class="table table-hover">
            <tr>
                <th scope="col">
                    <center>CLAVE</center>
                </th>
                <th scope="col">
                    <center>NOMBRE</center>
                </th>
                <th scope="col">
                    <center>ABREVIACION</center>
                </th>
                <th colspan="4">
                    <center>DATOS PERSONALES DEL JEFE DE DEPARTAMENTO</center>
                </th>
                <th scope="col">
                    <center>OPCIONES</center>
                </th>
            </tr>

            <?PHP
            //$group_by = "calificaciones.cve_alu";
            
            $consulta = "SELECT * from personals join departamentos on personals.cve_per = departamentos.jefe_cve_per" ; //. " group by " . $group_by; //cambiar
            $ejecuta = mysqli_query($mysqli, $consulta);

            while ($res = mysqli_fetch_assoc($ejecuta)) {
                echo '<tr id="datosTabla" >        
                        <td scope="row">' . $res['cve_dep'] . '</td>            
                        <td scope="row">' . $res['nombre_dep'] . '</td>
                        <td scope="row">' . $res['abrevia_dep'] . '</td> 
                        <td scope="row">' . $res['titulo_per'] . '</td>
                        <td scope="row">' . $res['nombre_per'] . '</td>
                        <td scope="row">' . $res['app_per'] . '</td>        
                        <td scope="row">' . $res['apm_per'] . '</td>      
                <td scope="row">
                    <a href="verDepartamentos.php?cve=' . $res['cve_dep'] . '">                
                        <button type="button" class="btn btn-warning"><i class="fas fa-user"></i></button>
                    </a>
                </td>        

                <td scope="row"> 
                    <a href="modificarDepartamentos.php?cve=' . $res['cve_dep'] . '">                
                        <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                </td>

                <td scope="row" id = "btneliminar">
                    <a href="eliminarDepartamentos.php?cve=' . $res['cve_dep'] . '">                        
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </a>
                </td>
            </tr>';
            }   ?>
        </table>
    </center>
</div>
