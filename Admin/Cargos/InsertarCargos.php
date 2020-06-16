<?php
include_once "encabezado.php";
?>
<?PHP
//MODIFICAR
if (isset($_GET["guardar"])) {

    $consulta2 = "INSERT into usuarios_cargos (cve_usu,user_usu,pass_usu,cve_per,cve_pue,cve_dep) 
        VALUES (null,'" . $_GET['user_usu'] . "','" . $_GET['pass_usu'] . "','" . $_GET['cve_per'] . "','" . $_GET['cve_pue'] . "','" . $_GET['cve_dep'] . "')";
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

?>


<div>
    <center>
        <table>
            <tr>
                <td>
                    <?php
                    $group_by = "alumnos.cve_alu";
                    $consulta = "SELECT * from personals"; //cambiar
                    $consulta2 = "SELECT * from departamentos"; //cambiar
                    $consulta3 = "SELECT * from puestos"; //cambiar
                    $ejecuta = mysqli_query($mysqli, $consulta);
                    $ejecuta2 = mysqli_query($mysqli, $consulta2);
                    $ejecuta3 = mysqli_query($mysqli, $consulta3);
                    //$res=mysqli_fetch_assoc($ejecuta);
                    ?>
                    <form enctype="multipart/form-data">
                        <!--Para enviar todos los archivos que agregemos dentro del mismo-->
                        <div class="row">
                            <div class="col-lg-12">
                                <br><br><br>
                                <table border="1" class="table table-hover">
                                    <div class="form-group">
                                        <label for="">USUARIO</label>
                                        <input value="" type="text" class="form-control" name="user_usu" autocomplete="off" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">PASSWORD</label>
                                        <input value="" type="text" class="form-control" name="pass_usu" autocomplete="off" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="cve_per">Selecciona la persona</label>
                                        <select name="cve_per" class="form-control" onchange="myFunction()">
                                            <?PHP
                                            while ($res = mysqli_fetch_assoc($ejecuta)) {
                                                echo ' <option value=' . $res['cve_per'] . ' > ' . $res['nombre_per'] . ' ' . $res['app_per'] . ' ' . $res['apm_per'] . ' </option>  ';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="cve_dep">Selecciona el departamento</label>
                                        <select name="cve_dep" class="form-control" onchange="myFunction()">
                                            <?PHP
                                            while ($res2 = mysqli_fetch_assoc($ejecuta2)) {
                                                echo ' <option value=' . $res2['cve_dep'] . ' > ' . $res2['nombre_dep'] . ' </option>  ';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="cve_pue">Selecciona el puesto</label>
                                        <select name="cve_pue" class="form-control" onchange="myFunction()">
                                            <?PHP
                                            while ($res3 = mysqli_fetch_assoc($ejecuta3)) {
                                                echo ' <option value=' . $res3['cve_pue'] . ' > ' . $res3['nombre_pue'] . ' </option>  ';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" value="Guardar" name="guardar" class="btn btn-success">Aceptar</button>
                                    <button type="reset" class="btn btn-danger">Cancelar</button>
                                </div>
                                </table>

                            </div>
                        </div>
</div>
</form>
</td>
</tr>
</table>
</center>
</div>