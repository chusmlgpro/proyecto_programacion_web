<?php
include_once "encabezado.php";
?>
<?php

//MODIFICAR
if (isset($_GET["guardar"])) {
	//$consulta2 = "UPDATE departamentos SET nombre_dep= 'A' ,abrevia_dep='B',jefe_cve_per=2 WHERE cve_dep = 2";//. $_GET['cve_dep'];
	$consulta2 = "UPDATE departamentos SET nombre_dep='" . $_GET['nombre_dep'] . "',abrevia_dep='" . $_GET['abrevia_dep'] . "',jefe_cve_per='" . $_GET['cve_per'] . "' WHERE cve_dep =". $_GET['cve_dep'];
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
				$consulta = "SELECT * from departamentos join personals on departamentos.jefe_cve_per=personals.cve_per WHERE departamentos.cve_dep=" . $_GET['cve']; //consulta
				$ejecuta = mysqli_query($mysqli, $consulta);
				$res = mysqli_fetch_assoc($ejecuta);

				$consulta3 = "SELECT * from personals"; //consulta
				$ejecuta3 = mysqli_query($mysqli, $consulta3);

				echo '<form>		
				<tr>											
				<td id="cabeceraTabla">CLAVE</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['cve_dep'] . '" readonly name="cve_dep" /></td>									
				</tr>			
				<tr>										
				<td id="cabeceraTabla">NOMBRE</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['nombre_dep'] . '" name="nombre_dep"/></td>									
				</tr>	
				<tr>
				<td id="cabeceraTabla">ABREVIACION</td>
				<td><input type="text" id="datosTablaInsertar"  value="' . $res['abrevia_dep'] . '" name="abrevia_dep"/></td>
				</tr>
			
			';
			}
			?>
			<tr>
				<td id="cabeceraTabla" colspan="6">
					<div class="form-group">
						<label  for="cve_per">Lista de jefes de departamento</label>
						<select name="cve_per" class="form-control" onchange="myFunction()">
							<?PHP
							echo ' <option value=' . $res['cve_per'] . ' > ' . $res['cve_per'] . ' ' . $res['nombre_per'] . ' ' . $res['app_per'] . ' ' . $res['apm_per'] . '</option>  ';
							while ($res3 = mysqli_fetch_assoc($ejecuta3)) {
								echo ' <option value=' . $res3['cve_per'] . ' > ' . $res3['cve_per'] . ' ' . $res3['nombre_per'] . ' ' . $res3['app_per'] . ' ' . $res3['apm_per'] . '</option>  ';
							}
							?>
						</select>
					</div>
				</td>
			</tr>
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