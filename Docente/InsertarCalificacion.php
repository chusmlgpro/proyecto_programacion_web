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

<?PHP
//MODIFICAR
if (isset($_GET["guardar"])) {
    
    $consulta2 = "INSERT into calificaciones (cve_cal,califi_cal,cve_alu,cve_usu,datetime_cal) 
        VALUES (null,'" . $_GET['califi_cal'] . "','" . $_GET['cve_alu'] . "'," . $_SESSION["cve_usu"] . ",now()   )";
    //echo $consultacopia = "insert into alumnocopia (cve_alu,nom_alu,app_alu,apm_alu,tel_alu,mensualidad_alu,grupo_alu,fchaing_alu) VALUES ('" . $_GET['cve_alu'] . "','" . $_GET['nom_alu'] . "','" . $_GET['app_alu'] . "','" . $_GET['apm_alu'] . "','" . $_GET['tel_alu'] . "','" . $_GET['mensualidad_alu'] . "','" . $_GET['grupo_alu'] . "',curdate()   )";
    $ejecuta2 = mysqli_query($mysqli, $consulta2);
    //$ejecutacopia = mysqli_query($mysqli, $consultacopia);

    $res=$mysqli->affected_rows;
    
    if($res==1)
	{
	echo '<script> location.href="index.php";</script>';
	}
	else{ echo "NO HAY DATOS";}		
}

?>

<?php
    include_once "encabezado.php";
?>
    <div>
        <center>
            <table>
                <tr>
                    <td>
                        <?php
                        $group_by = "alumnos.cve_alu";
                        $consulta = "select * from alumnos group by " . $group_by; //cambiar
                        //where usuarios_cargos.cve_usu = " . $_SESSION["cve_usu"] . "		
                        $ejecuta = mysqli_query($mysqli, $consulta);
                        //$res=mysqli_fetch_assoc($ejecuta);
                        ?>
                        <form>
                            <!--Para enviar todos los archivos que agregemos dentro del mismo-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <br><br><br>
                                    <div class="form-group">
                                        <label for="cve_alu">Lista de todos los estudiantes</label>
                                        <select name="cve_alu" class="form-control" onchange="myFunction()">
                                            <?PHP
                                            
                                            while ($res = mysqli_fetch_assoc($ejecuta)) {
                                                echo ' <option value=' . $res['cve_alu'] . ' > ' . $res['cve_alu'] . ' ' . $res['nombre_alu'] . ' ' . $res['app_alu'] . ' ' . $res['apm_alu'] . '</option>  ';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="califi_cal">Calificacion</label>
                                        <input type="text" class="form-control" name="califi_cal" placeholder="Ingresa Calificacion" autocomplete="off" required>
                                    </div>

                                    <button type="submit" value="Guardar" name="guardar" class="btn btn-success">Aceptar</button>
                                    <button type="reset" class="btn btn-danger">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </center>
    </div>