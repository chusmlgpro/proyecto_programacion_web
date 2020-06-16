<?php
include_once "encabezado.php";
?>
<?PHP
//MODIFICAR
/*if (isset($_GET["guardar"])) {

        $consulta2 = "INSERT into personals (cve_per,titulo_per,nombre_per,app_per,apm_per,sexo_per,rfc_per,curp_per,foto_per,correo_per) 
        VALUES (null,'" . $_GET['titulo_per'] . "','" . $_GET['nombre_per'] . "','" . $_GET['app_per'] . "','" . $_GET['apm_per'] . "','" . $_GET['sexo_per'] . "','" . $_GET['rfc_per'] . "','" . $_GET['curp_per'] . "','$destino', ". $_GET['correo_per'] . "')";
    //echo $consultacopia = "insert into alumnocopia (cve_alu,nom_alu,app_alu,apm_alu,tel_alu,mensualidad_alu,grupo_alu,fchaing_alu) VALUES ('" . $_GET['cve_alu'] . "','" . $_GET['nom_alu'] . "','" . $_GET['app_alu'] . "','" . $_GET['apm_alu'] . "','" . $_GET['tel_alu'] . "','" . $_GET['mensualidad_alu'] . "','" . $_GET['grupo_alu'] . "',curdate()   )";
    $ejecuta2 = mysqli_query($mysqli, $consulta2);
    //$ejecutacopia = mysqli_query($mysqli, $consultacopia);

    $res = $mysqli->affected_rows;

    if ($res == 1) {
        echo '<script> location.href="index.php";</script>';
    } else {
        echo "NO HAY DATOS";
    }

    }
*/

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
                    <form action="alta_alumno.php" method="post" enctype="multipart/form-data">
                        <!--Para enviar todos los archivos que agregemos dentro del mismo-->
                        <div class="row">
                            <div class="col-lg-12">
                                <br><br><br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <table border="1" class="table table-hover">

                                            <div class="form-group">
                                                <label for="">TITULO</label>
                                                <select name="titulo_per" class="form-control">
                                                    <option value="Licenciatura en Administracion">Licenciatura en Administracion</option>
                                                    <option value="Contador Publico">Contador Publico</option>
                                                    <option value="Ingenieria en Gestion Empresarial">Ingenieria en Gestion Empresarial</option>
                                                    <option value="Arquitectura">Arquitectura</option>
                                                    <option value="Ingenieria Civil">Ingenieria Civil</option>
                                                    <option value="Ingenieria Electromecanica">Ingenieria Electromecanica</option>
                                                    <option value="Ingenieria en Industrias Alimentarias">Ingenieria en Industrias Alimentarias</option>
                                                    <option value="Ingenieria Agricola Sustentable">Ingenieria Agricola Sustentable</option>
                                                    <option value="Ingenieria Industrial">Ingenieria Industrial</option>
                                                    <option value="Ingenieria en Sistemas Computacionales">Ingenieria en Sistemas Computacionales</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">NOMBRE</label>
                                                <input value="chus" type="text" class="form-control" name="nombre_per" autocomplete="off" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="">PATERNO</label>
                                                <input value="chus" type="text" class="form-control" name="app_per" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label for="">MATERNO</label>
                                                <input value="chus" type="text" class="form-control" name="apm_per" autocomplete="off" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="">SEXO</label>
                                                <select name="sexo_per" class="form-control">
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                </select>
                                            </div>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <table border="1" class="table table-hover">


                                            <div class="form-group">
                                                <label for="">RFC</label>
                                                <input value="chus" type="text" class="form-control" name="rfc_per" autocomplete="off" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="">CURP</label>
                                                <input value="chus" type="text" class="form-control" name="curp_per" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label for="">FOTO</label>
                                                <input type="file" class="form-control" name="foto_per" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label for="">CORREO</label>
                                                <input value="chus@gmil.com" type="email" class="form-control" name="correo_per" autocomplete="off" required />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" value="Guardar" name="accion" class="btn btn-success">Aceptar</button>
                                                <button type="reset" class="btn btn-danger">Cancelar</button>
                                            </div>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
</div>
</form>
</td>
</tr>
</table>
</center>
</div>
