<?php
include_once "encabezado.php";
?>
<?PHP
//MODIFICAR
if (isset($_GET["guardar"])) {

    $consulta2 = "INSERT into puestos (cve_pue,nombre_pue) 
        VALUES (null,'" . $_GET['nombre_pue'] . "')";
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
                    //where usuarios_cargos.cve_usu = " . $_SESSION["cve_usu"] . "		
                    $ejecuta = mysqli_query($mysqli, $consulta);
                    //$res=mysqli_fetch_assoc($ejecuta);
                    ?>
                    <form enctype="multipart/form-data">
                        <!--Para enviar todos los archivos que agregemos dentro del mismo-->
                        <div class="row">
                            <div class="col-lg-12">
                                <br><br><br>
                                <table border="1" class="table table-hover">
                                    <div class="form-group">
                                        <label for="">PUESTO</label>
                                        <input value="" type="text" class="form-control" name="nombre_pue" autocomplete="off" required />
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