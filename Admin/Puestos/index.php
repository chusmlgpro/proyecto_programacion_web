<?php
include_once "encabezado.php";
?>

<a href="insertarPuestos.php">
    <button id="aceptar">
        <i class="fa fa-user"></i>
        Registrar nuevo puesto
        <i class="fa fa-plus"></i>
    </button>
</a>

<div>
    <center>
        <table>
            <tr>
                <td></td>
                <td>
                    <table border="0" class="table table-hover">
                        <tr>
                            <th scope="col">
                                <center>CLAVE</center>
                            </th>
                            <th colspan="" scope="col">
                                <center>PUESTO</center>
                            </th>
                            <th scope="col">
                                <center>OPCIONES</center>
                            </th>
                        </tr>

                        <?PHP
                        //$group_by = "calificaciones.cve_alu";

                        $consulta = "SELECT * from puestos"; //. " group by " . $group_by; //cambiar
                        $ejecuta = mysqli_query($mysqli, $consulta);

                        while ($res = mysqli_fetch_assoc($ejecuta)) {
                            echo '<tr id="datosTabla" >        
                        <td scope="row">' . $res['cve_pue'] . '</td>            
                        <td scope="row">' . $res['nombre_pue'] . '</td>      
                <td scope="row">
                    <a href="verPuestos.php?cve=' . $res['cve_pue'] . '">                
                        <button type="button" class="btn btn-warning"><i class="fas fa-user"></i></button>
                    </a>
                    <a href="modificarPuestos.php?cve=' . $res['cve_pue'] . '">                
                    <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                    <a href="eliminarPuestos.php?cve=' . $res['cve_pue'] . '">                        
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </a>

                   
                </td>
            </tr>';
                        }   ?>
                    </table>
                </td>
                <td></td>
            </tr>

        </table>
    </center>
</div>