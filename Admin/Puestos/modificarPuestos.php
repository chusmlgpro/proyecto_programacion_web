<?php
include_once "encabezado.php";
?>
<?php

//MODIFICAR
if (isset($_GET["guardar"])) {
	//$consulta2 = "UPDATE departamentos SET nombre_dep= 'A' ,abrevia_dep='B',jefe_cve_per=2 WHERE cve_dep = 2";//. $_GET['cve_dep'];
	$consulta2 = "UPDATE puestos SET nombre_pue='" . $_GET['nombre_pue'] . "' WHERE cve_pue =". $_GET['cve_pue'];
		//echo $consulta3 = "UPDATE alumnocopia SET nom_alu='" . $_GET['nom_alu'] . "',app_alu='" . $_GET['app_alu'] . "',apm_alu='" . $_GET['apm_alu'] . "',tel_alu='" . $_GET['tel_alu'] . "',mensualidad_alu='" . $_GET['mensualidad_alu'] . "',grupo_alu='" . $_GET['grupo_alu'] . "', fchaing_alu='" . $_GET['fchaing_alu'] . "' WHERE cve_alu = " . $_GET['cve_alu'];
	$ejecuta2 = mysqli_query($mysqli, $consulta2);
	//$ejecuta2 = mysqli_query($mysqli, $consulta3);
	$res2 = $mysqli->affected_rows;
	if ($res2 == 1) {
		echo '<script> location.href="index.php";</script>';
	} else {
		echo "NO HAY DATOS2s";
	}
}

?>
<div>
	<center>

		<table width="200" border="0">


			<?PHP
			if (isset($_GET['cve'])) {
				//$consulta="SELECT * FROM persona WHERE persona.id_cve_alu=".$_GET['cve']; //consulta
				$consulta = "SELECT * from puestos WHERE cve_pue=" . $_GET['cve']; //consulta
				$ejecuta = mysqli_query($mysqli, $consulta);
				$res = mysqli_fetch_assoc($ejecuta);

				$consulta3 = "SELECT * from personals"; //consulta
				$ejecuta3 = mysqli_query($mysqli, $consulta3);

				echo '<form>		
				<tr>											
				<td id="cabeceraTabla">CLAVE</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['cve_pue'] . '" readonly name="cve_pue" /></td>									
				</tr>			
				<tr>										
				<td id="cabeceraTabla">NOMBRE</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['nombre_pue'] . '" name="nombre_pue"/></td>									
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
		


		</table>;
		

	</center>
</div>

</body>


</html>