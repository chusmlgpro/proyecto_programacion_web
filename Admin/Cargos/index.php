<?php
include_once "encabezado.php";
?>

<a href="insertarCargos.php">
    <button id="aceptar">
        <i class="fa fa-user"></i>
        Registrar nuevo cargo
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
                                <center>USUARIO</center>
                            </th>
                            <th colspan="" scope="col">
                                <center>PASSWORD</center>
                            </th>
                            <th colspan="" scope="col">
                                <center>NOMBRE DE LA PERSONA</center>
                            </th>
                            <th colspan="" scope="col">
                                <center>PUESTO</center>
                            </th>
                            <th colspan="" scope="col">
                                <center>DEPARTAMENTO</center>
                            </th>
                            <th scope="col">
                                <center>OPCIONES</center>
                            </th>
                        </tr>

                        <?PHP
                        //$group_by = "calificaciones.cve_alu";

                        $consulta = "SELECT * from usuarios_cargos join puestos on puestos.cve_pue = usuarios_cargos.cve_pue join personals on personals.cve_per = usuarios_cargos.cve_per join departamentos on departamentos.cve_dep = usuarios_cargos.cve_dep"; //. " group by " . $group_by; //cambiar
                        $ejecuta = mysqli_query($mysqli, $consulta);

                        while ($res = mysqli_fetch_assoc($ejecuta)) {
                            echo '<tr id="datosTabla" >        
                        <td scope="row">' . $res['cve_usu'] . '</td>            
                        <td scope="row">' . $res['user_usu'] . '</td>
                        <td scope="row">' . $res['pass_usu'] . '</td> 
                        <td scope="row">' . $res['nombre_per'] . ' ' . $res['app_per'] . ' ' . $res['apm_per'] . '</td>         
                        <td scope="row">' . $res['nombre_pue'] . '</td>  
                        <td scope="row">' . $res['nombre_dep'] . '</td>  
                <td scope="row">
                    <a href="verCargos.php?cve=' . $res['cve_usu'] . '">                
                        <button type="button" class="btn btn-warning"><i class="fas fa-user"></i></button>
                    </a>
                    <a href="modificarCargos.php?cve=' . $res['cve_usu'] . '">                
                    <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                    <a href="eliminarCargos.php?cve=' . $res['cve_usu'] . '">                        
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