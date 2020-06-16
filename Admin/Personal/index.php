<?php
include_once "encabezado.php";
?>

<a href="insertarPersonal.php">
    <button id="aceptar">
        <i class="fa fa-user"></i>
        Registrar nuevo personal
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
                    <center>CARRERA</center>
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
                    <center>GENERO</center>
                </th>
                <th scope="col">
                    <center>RFC</center>
                </th>
                <th scope="col">
                    <center>CURP</center>
                </th>
                <th scope="col">
                    <center>FOTO</center>
                </th>
                <th scope="col">
                    <center>CORREO</center>
                </th>
                <th scope="col">
                    <center>OPCIONES</center>
                </th>
            </tr>

            <?PHP
            //$group_by = "calificaciones.cve_alu";
            $consulta = "SELECT * from personals";
            $ejecuta = mysqli_query($mysqli, $consulta);
            while ($res = mysqli_fetch_assoc($ejecuta)) {
                echo '<tr id="datosTabla" >        
                        <td scope="row">' . $res['cve_per'] . '</td>            
                        <td scope="row">' . $res['titulo_per'] . '</td>
                        <td scope="row">' . $res['nombre_per'] . '</td>
                        <td scope="row">' . $res['app_per'] . '</td>        
                        <td scope="row">' . $res['apm_per'] . '</td>  
                        <td scope="row">' . $res['sexo_per'] . '</td>      
                        <td scope="row">' . $res['rfc_per'] . '</td>   
                        <td scope="row">' . $res['curp_per'] . '</td>       
                        <td scope="row"><img src="fotos/'.$res['foto_per'].'" width="40px" heigth="40px" /></td>    
                        <td scope="row">' . $res['correo_per'] . '</td>           

                <td scope="row">
                    <a href="verPersonal.php?cve=' . $res['cve_per'] . '">                
                        <button type="button" class="btn btn-warning"><i class="fas fa-user"></i></button>
                    </a>
                </td>        

                <td scope="row"> 
                    <a href="modificarPersonal.php?cve=' . $res['cve_per'] . '">                
                        <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                </td>

                <td scope="row" id = "btneliminar">
                    <a href="eliminarPersonal.php?cve=' . $res['cve_per'] . '">                        
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </a>
                </td>
            </tr>';
            }   ?>
        </table>
    </center>
</div>
