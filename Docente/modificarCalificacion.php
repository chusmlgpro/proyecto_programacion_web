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

<div>
	<center>

		<div class="col-sm-4">
                <table border="1" class="table table-hover">
                    <div class="form-group">
                        <label for="carrera_alu">Carrera</label>
                        <select name="carrera_alu" class="form-control">
                            <option>.:Carrera:.</option>
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
                        <label for="app_alu">Apellido Paterno</label>
                        <input type="text" class="form-control" name="app_alu" placeholder="Ingresa Apellido Paterno" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="apm_alu">Apellido Materno</label>
                        <input type="text" class="form-control" name="apm_alu" placeholder="Ingresa Apellido Materno" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="nombre_alu">Nombre</label>
                        <input type="text" class="form-control" name="nombre_alu" placeholder="Ingresa Nombre" autocomplete="off" required>
                    </div>
                </table>
            </div>

			<?PHP
			if (isset($_GET['cve'])) {
				//$consulta="SELECT * FROM persona WHERE persona.id_cve_alu=".$_GET['cve']; //consulta
				$consulta = "SELECT * from calificaciones join alumnos on alumnos.cve_alu = calificaciones.cve_alu join usuarios_cargos on usuarios_cargos.cve_usu=calificaciones.cve_usu join puestos on puestos.cve_pue = usuarios_cargos.cve_pue join personals on personals.cve_per = usuarios_cargos.cve_per join departamentos on departamentos.cve_dep = usuarios_cargos.cve_dep WHERE calificaciones.cve_cal=" . $_GET['cve']; //consulta

				$ejecuta = mysqli_query($mysqli, $consulta);
				$res = mysqli_fetch_assoc($ejecuta);

				echo '<form>		

				<tr>											
				<td id="cabeceraTabla">CVE</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['cve_cal'] . '" readonly name="cve_cal" /></td>									
					</tr>		
				<tr>											
				<td id="cabeceraTabla">No. CONTROL</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['cve_alu'] . '" readonly name="cve_alu" /></td>									
			</tr>		
			<tr>										
				<td id="cabeceraTabla">NOMBRE</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['nombre_alu'] . '" readonly name="nombre_alu"/></td>									
			</tr>	
			<tr>
				<td id="cabeceraTabla">PATERNO</td>
				<td><input type="text" id="datosTablaInsertar"  value="' . $res['app_alu'] . '"  readonly name="app_alu"/></td>
			</tr>	
			<tr>
				<td id="cabeceraTabla">MATERNO</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['apm_alu'] . '" readonly name="apm_alu"/></td>
			</tr>	
			<tr>
				<td id="cabeceraTabla">CALIFICACION</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['califi_cal'] . '" name="califi_cal" /></td>
			</tr>	
			
			';
			}
			?>


			<TR>
				<TD COLSPAN="6">
					<center>
						<input type="submit" value="Modificar" id="aceptar" name="guardar" />
					</center>
					</form>
				</TD>
			</TR>
			<?php

			//MODIFICAR
			if (isset($_GET["guardar"])) {
				$consulta2 = "UPDATE calificaciones SET califi_cal='" . $_GET['califi_cal'] . "',datetime_cal = now() WHERE cve_cal = " . $_GET['cve_cal'];
				//echo $consulta3 = "UPDATE alumnocopia SET nom_alu='" . $_GET['nom_alu'] . "',app_alu='" . $_GET['app_alu'] . "',apm_alu='" . $_GET['apm_alu'] . "',tel_alu='" . $_GET['tel_alu'] . "',mensualidad_alu='" . $_GET['mensualidad_alu'] . "',grupo_alu='" . $_GET['grupo_alu'] . "', fchaing_alu='" . $_GET['fchaing_alu'] . "' WHERE cve_alu = " . $_GET['cve_alu'];
				$ejecuta2 = mysqli_query($mysqli, $consulta2);
				//$ejecuta2 = mysqli_query($mysqli, $consulta3);
				$res = $mysqli->affected_rows;
				if ($res == 1) {
					echo '<script> location.href="index.php";</script>';
				} else {
					echo "NO HAY DATOS";
				}
			}

			?>


		</table>;

	</center>
</div>

</body>

</html>