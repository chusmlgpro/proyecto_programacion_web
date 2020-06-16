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
<br><br><br><br><br><br><br><br>
<div>
	<center>

		<table width="200" border="0">


			<?PHP
			if (isset($_GET['cve'])) {
				//$consulta="SELECT * FROM persona WHERE persona.id_cve_per=".$_GET['cve']; //consulta
				$consulta = "SELECT * from calificaciones join alumnos on alumnos.cve_alu = calificaciones.cve_alu join usuarios_cargos on usuarios_cargos.cve_usu=calificaciones.cve_usu join puestos on puestos.cve_pue = usuarios_cargos.cve_pue join personals on personals.cve_per = usuarios_cargos.cve_per join departamentos on departamentos.cve_dep = usuarios_cargos.cve_dep WHERE calificaciones.cve_cal=" . $_GET['cve']; //consulta
				$ejecuta = mysqli_query($mysqli, $consulta);
				$res = mysqli_fetch_assoc($ejecuta);

				echo '<form>		

				<tr>											
					<td id="cabeceraTabla">NUMERO</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['cve_alu'] . '" name="cve_alu" readonly /></td>									
				</tr>		
				<tr>	 									
					<td id="cabeceraTabla">NOMBRE</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['nombre_alu'] . '" name="nom_alu" readonly /></td>									
				</tr>	
				<tr>
					<td id="cabeceraTabla">PATERNO</td>
					<td><input type="text" id="datosTablaInsertar"  value="' . $res['app_alu'] . '"  name="app_alu" readonly /></td>
				</tr>	
				<tr>
					<td id="cabeceraTabla">MATERNO</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['apm_alu'] . '" name="apm_alu" readonly /></td>
				</tr>	
				<tr>
					<td id="cabeceraTabla">CALIFICACION</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['califi_cal'] . '" name="califi_cal" readonly /></td>
				</tr>					
				<tr>
					<td id="cabeceraTabla">DOCENTE</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['nombre_per'] . '" name="nombre_per" readonly /></td>			
				</tr>	
				<tr>
					<td id="cabeceraTabla">FECHA</td>					
					<td><input type="text" id="datosTablaInsertar" value="' . $res['datetime_cal'] . '" name="datetime_cal"  readonly /></td>			
				</tr>
				';
			}	?>
		</table>;
	</center>
</div>